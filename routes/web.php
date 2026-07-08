<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

// Public Front-End Routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/tentang-kami', [PublicController::class, 'about'])->name('about');
Route::get('/kegiatan', [PublicController::class, 'posts'])->name('kegiatan.index');
Route::get('/kegiatan/{slug}', [PublicController::class, 'postDetail'])->name('kegiatan.show');
Route::get('/pengumuman', [PublicController::class, 'announcements'])->name('announcements.index');
Route::get('/pengumuman/{slug}', [PublicController::class, 'announcementDetail'])->name('announcements.show');
Route::get('/galeri', [PublicController::class, 'gallery'])->name('gallery.index');
Route::get('/umkm', [PublicController::class, 'umkm'])->name('umkm.index');
Route::get('/kontak', [PublicController::class, 'contact'])->name('contact');

// Authenticated Dashboard Redirect
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

// Profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin panel routes (guarded by auth and admin role)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('posts', PostController::class);
    Route::resource('announcements', AnnouncementController::class);
    Route::resource('galleries', GalleryController::class)->except(['show']);
    Route::resource('managements', ManagementController::class)->except(['show']);
    Route::resource('umkms', UmkmController::class)->except(['show']);
    
    // Website Settings
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';
