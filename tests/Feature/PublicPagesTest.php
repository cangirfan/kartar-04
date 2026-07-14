<?php

use App\Models\User;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Seed setting since views expect it
    Setting::create([
        'website_name' => 'Karang Taruna RT 05',
        'address' => 'Jl. Pemuda No. 12',
        'whatsapp' => '628123456789',
        'email' => 'kartar@example.com',
        'donation_qr' => 'settings/qris_mockup.png',
    ]);
});

test('public pages are accessible', function ($url) {
    $response = $this->get($url);
    $response->assertStatus(200);
})->with([
    '/',
    '/tentang-kami',
    '/kegiatan',
    '/pengumuman',
    '/galeri',
    '/umkm',
    '/kontak',
]);

test('admin dashboard requires login', function () {
    $response = $this->get('/admin/dashboard');
    $response->assertRedirect('/login');
});

test('admin dashboard is accessible by admin user', function () {
    // Set up role and permission
    $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
    
    $admin = User::factory()->create([
        'email' => 'admin-test@kartar.local',
    ]);
    $admin->assignRole($role);

    $response = $this->actingAs($admin)->get('/admin/dashboard');
    $response->assertStatus(200);
});

test('gallery public filter only shows categories that have gallery items', function () {
    Category::create([
        'name' => 'Kerja Bakti',
        'slug' => 'kerja-bakti',
        'is_active' => true,
        'sort_order' => 1,
    ]);

    Category::create([
        'name' => 'Kategori Kosong',
        'slug' => 'kategori-kosong',
        'is_active' => true,
        'sort_order' => 2,
    ]);

    Gallery::create([
        'title' => 'Dokumentasi Kerja Bakti',
        'category' => 'Kerja Bakti',
    ]);

    $response = $this->get('/galeri');

    $response->assertStatus(200)
        ->assertSee('Kerja Bakti')
        ->assertDontSee('Kategori Kosong');
});

test('posts public filter only shows categories that have published posts', function () {
    Category::create([
        'name' => 'Bakti Sosial',
        'slug' => 'bakti-sosial',
        'is_active' => true,
        'sort_order' => 1,
    ]);

    Category::create([
        'name' => 'Kategori Kegiatan Kosong',
        'slug' => 'kategori-kegiatan-kosong',
        'is_active' => true,
        'sort_order' => 2,
    ]);

    Category::create([
        'name' => 'Draft Kegiatan',
        'slug' => 'draft-kegiatan',
        'is_active' => true,
        'sort_order' => 3,
    ]);

    Post::create([
        'title' => 'Kegiatan Bakti Sosial',
        'slug' => 'kegiatan-bakti-sosial',
        'content' => 'Isi kegiatan bakti sosial.',
        'category' => 'Bakti Sosial',
        'status' => true,
    ]);

    Post::create([
        'title' => 'Kegiatan Masih Draft',
        'slug' => 'kegiatan-masih-draft',
        'content' => 'Belum publish.',
        'category' => 'Draft Kegiatan',
        'status' => false,
    ]);

    $response = $this->get('/kegiatan');

    $response->assertStatus(200)
        ->assertSee('Bakti Sosial')
        ->assertDontSee('Kategori Kegiatan Kosong')
        ->assertDontSee('Draft Kegiatan');
});

