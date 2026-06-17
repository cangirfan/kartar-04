<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MockDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Posts (Kegiatan)
        \App\Models\Post::create([
            'title' => 'Kerja Bakti Bersama Warga',
            'slug' => 'kerja-bakti-bersama-warga',
            'content' => 'Menjaga kebersihan lingkungan merupakan tanggung jawab bersama. Karang Taruna RT 05 mengadakan kerja bakti pembersihan saluran air dan perapihan taman warga. Kegiatan ini diikuti oleh seluruh warga RT 05 dengan antusiasme yang tinggi. Selain membersihkan lingkungan, kegiatan ini juga mempererat tali silaturahmi antar tetangga.',
            'thumbnail' => null,
            'category' => 'Kerja Bakti',
            'published_at' => now(),
            'status' => true,
        ]);

        \App\Models\Post::create([
            'title' => 'Semarak HUT RI ke-81',
            'slug' => 'semarak-hut-ri-ke-81',
            'content' => 'Dalam rangka memperingati Hari Kemerdekaan Republik Indonesia ke-81, Karang Taruna RT 05 menyelenggarakan serangkaian perlombaan menarik untuk anak-anak, remaja, hingga orang tua. Perlombaan meliputi balap karung, makan kerupuk, tarik tambang, dan ditutup dengan malam puncak pentas seni yang menampilkan bakat-bakat lokal warga.',
            'thumbnail' => null,
            'category' => '17 Agustus',
            'published_at' => now(),
            'status' => true,
        ]);

        \App\Models\Post::create([
            'title' => 'Santunan Anak Yatim & Dhuafa',
            'slug' => 'santunan-anak-yatim-dan-dhuafa',
            'content' => 'Sebagai wujud kepedulian sosial, bidang Kerohanian Karang Taruna menyelenggarakan santunan untuk adik-adik yatim piatu dan dhuafa di wilayah RT 05. Terima kasih kepada para donatur yang telah membagikan rezekinya. Semoga kebaikan kita semua dibalas oleh Tuhan Yang Maha Esa.',
            'thumbnail' => null,
            'category' => 'Santunan',
            'published_at' => now(),
            'status' => true,
        ]);

        \App\Models\Post::create([
            'title' => 'Turnamen Futsal Pemuda RT',
            'slug' => 'turnamen-futsal-pemuda-rt',
            'content' => 'Meningkatkan sportivitas dan kebersamaan antar pemuda melalui olahraga. Bidang Olahraga menyelenggarakan turnamen futsal internal antar RT di lingkungan RT 05. Turnamen ini memperebutkan Piala Bergilir Ketua RT dan diharapkan menjadi wadah penyaluran bakat olahraga pemuda.',
            'thumbnail' => null,
            'category' => 'Olahraga',
            'published_at' => now(),
            'status' => true,
        ]);

        // Announcements (Pengumuman)
        \App\Models\Announcement::create([
            'title' => 'Rapat Rutin Bulanan Karang Taruna',
            'slug' => 'rapat-rutin-bulanan-karang-taruna',
            'description' => 'Undangan rapat rutin bulanan pengurus Karang Taruna RT 05 pada hari Sabtu malam Minggu besok pukul 19.30 WIB bertempat di Balai RT. Agenda pembahasan: Evaluasi kegiatan bulanan dan persiapan menyambut hari kemerdekaan. Harap hadir tepat waktu bagi seluruh pengurus.',
            'published_at' => now(),
            'status' => true,
        ]);

        \App\Models\Announcement::create([
            'title' => 'Jadwal Kerja Bakti Kebersihan RT',
            'slug' => 'jadwal-kerja-bakti-kebersihan-rt',
            'description' => 'Pengumuman kerja bakti serentak tingkat RT 05 yang akan dilaksanakan pada hari Minggu besok mulai jam 07.00 pagi. Fokus pembersihan adalah saluran air utama untuk mengantisipasi musim hujan. Warga diharapkan membawa peralatan kebersihan masing-masing seperti cangkul, sapu lidi, dan karung.',
            'published_at' => now(),
            'status' => true,
        ]);

        // Galleries (Galeri)
        \App\Models\Gallery::create([
            'title' => 'Keseruan Tarik Tambang 17 Agustus',
            'image' => null,
            'category' => '17 Agustus',
        ]);

        \App\Models\Gallery::create([
            'title' => 'Kerja Bakti Pembersihan Saluran Air',
            'image' => null,
            'category' => 'Kerja Bakti',
        ]);

        \App\Models\Gallery::create([
            'title' => 'Penyerahan Santunan Sembako',
            'image' => null,
            'category' => 'Santunan',
        ]);

        // Managements (Pengurus)
        \App\Models\Management::create([
            'name' => 'Aditya Pratama',
            'position' => 'Ketua Karang Taruna',
            'description' => 'Memimpin organisasi dan mengoordinasikan seluruh bidang kepengurusan demi kemajuan kepemudaan RT.',
            'image' => null,
        ]);

        \App\Models\Management::create([
            'name' => 'Siti Rahmawati',
            'position' => 'Sekretaris',
            'description' => 'Mengurus administrasi, surat-menyurat, proposal kegiatan, dan pengarsipan data organisasi.',
            'image' => null,
        ]);

        \App\Models\Management::create([
            'name' => 'Rian Hidayat',
            'position' => 'Bendahara',
            'description' => 'Mengelola keuangan organisasi, menyusun laporan kas bulanan, dan merancang anggaran kegiatan.',
            'image' => null,
        ]);

        // UMKM Warga
        \App\Models\Umkm::create([
            'name' => 'Warung Mpok Siti',
            'owner_name' => 'Siti Aminah',
            'description' => 'Menyediakan aneka nasi uduk, lontong sayur, gorengan hangat, dan minuman segar untuk sarapan Anda dengan harga merakyat.',
            'whatsapp' => '628123456789',
            'location' => 'RT 02 / RT 05, Depan Pos Ronda',
            'image' => null,
            'status' => true,
        ]);

        \App\Models\Umkm::create([
            'name' => 'Dapur Manis Snack',
            'owner_name' => 'Rina Kartika',
            'description' => 'Menerima pesanan aneka kue basah, snack box untuk rapat RT, dan kue ulang tahun kastem dengan bahan premium tanpa pengawet.',
            'whatsapp' => '628987654321',
            'location' => 'RT 04 / RT 05, No. 15',
            'image' => null,
            'status' => true,
        ]);
    }
}
