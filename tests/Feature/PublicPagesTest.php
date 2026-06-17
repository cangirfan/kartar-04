<?php

use App\Models\User;
use App\Models\Setting;
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
