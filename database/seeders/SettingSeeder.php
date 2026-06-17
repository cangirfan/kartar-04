<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::create([
            'website_name' => 'Karang Taruna RT 05',
            'logo' => null,
            'banner' => null,
            'donation_qr' => 'settings/qris_mockup.png',
            'address' => 'Jl. Pemuda No. 12, Kelurahan Harapan, Kecamatan Jaya',
            'whatsapp' => '628123456789',
            'email' => 'kartar.rt05@gmail.com',
        ]);
    }
}
