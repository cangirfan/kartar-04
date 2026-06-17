# Website Informasi Karang Taruna RT

## Overview
Website Informasi Karang Taruna RT adalah platform berbasis web yang digunakan untuk menampilkan informasi kegiatan, pengumuman, dokumentasi, dan profil organisasi Karang Taruna di tingkat RT.

Website ini bertujuan untuk meningkatkan komunikasi antar warga, memperlihatkan aktivitas Karang Taruna, serta menjadi media informasi yang mudah diakses oleh masyarakat.

---

## Objectives

- Menyediakan informasi kegiatan Karang Taruna RT
- Menampilkan dokumentasi kegiatan masyarakat
- Menjadi pusat informasi pengumuman warga
- Memperkenalkan struktur kepengurusan Karang Taruna
- Meningkatkan branding dan profesionalitas organisasi

---

## Features

### Public Features

#### 1. Home Page
Menampilkan informasi utama website.

Features:
- Hero banner
- Sambutan Ketua Karang Taruna
- Highlight kegiatan terbaru
- Pengumuman terbaru
- Preview galeri dokumentasi

---

#### 2. Tentang Kami
Menampilkan informasi organisasi.

Features:
- Sejarah Karang Taruna
- Visi & Misi
- Struktur Organisasi
- Profil Pengurus

---

#### 3. Kegiatan
Menampilkan seluruh aktivitas Karang Taruna.

Features:
- List kegiatan
- Detail kegiatan
- Dokumentasi kegiatan
- Kategori kegiatan

Example Categories:
- Kerja Bakti
- 17 Agustus
- Santunan
- Olahraga
- Event Pemuda

---

#### 4. Pengumuman
Menampilkan informasi terbaru kepada warga.

Features:
- List pengumuman
- Detail pengumuman
- Status aktif/nonaktif
- Tanggal publikasi

Examples:
- Jadwal rapat
- Kerja bakti
- Informasi kegiatan RT
- Event mendatang

---

#### 5. Galeri
Menampilkan dokumentasi kegiatan.

Features:
- Album foto
- Video dokumentasi
- Filter kategori kegiatan

---

#### 6. UMKM Warga (Optional)
Menampilkan usaha milik warga.

Features:
- Nama usaha
- Foto usaha
- Deskripsi
- Kontak WhatsApp
- Lokasi

---

#### 7. Kontak
Menampilkan informasi kontak Karang Taruna.

Features:
- Alamat sekretariat
- Google Maps
- WhatsApp Admin
- Social Media

---

## Admin Features

### Dashboard
Menampilkan ringkasan informasi website.

Features:
- Total kegiatan
- Total pengumuman
- Total galeri
- Statistik website

---

### Content Management

#### Manage Kegiatan
CRUD kegiatan:
- Add kegiatan
- Edit kegiatan
- Delete kegiatan
- Publish/Unpublish

---

#### Manage Pengumuman
CRUD pengumuman:
- Add pengumuman
- Edit pengumuman
- Delete pengumuman

---

#### Manage Galeri
CRUD galeri:
- Upload foto
- Upload video
- Create album

---

#### Manage Pengurus
CRUD data pengurus:
- Nama
- Jabatan
- Foto
- Deskripsi

---

#### Website Settings
Pengaturan website:
- Nama organisasi
- Logo
- Banner
- Kontak
- Social media

---

## Tech Stack

### Backend
- Laravel 12
- PHP 8.3+
- MySQL

### Frontend
- Tailwind CSS
- Alpine.js

### Authentication
- Laravel Breeze

### Additional Package
- Spatie Laravel Permission
- Intervention Image

---

## Database Structure

### Tables

#### users
| Column | Type |
|---------|------|
| id | bigint |
| name | string |
| email | string |
| password | string |

---

#### posts
Digunakan untuk kegiatan.

| Column | Type |
|---------|------|
| id | bigint |
| title | string |
| slug | string |
| content | longText |
| thumbnail | string |
| category | string |
| published_at | timestamp |
| status | boolean |

---

#### announcements

| Column | Type |
|---------|------|
| id | bigint |
| title | string |
| slug | string |
| description | text |
| published_at | timestamp |
| status | boolean |

---

#### galleries

| Column | Type |
|---------|------|
| id | bigint |
| title | string |
| image | string |
| category | string |

---

#### managements

| Column | Type |
|---------|------|
| id | bigint |
| name | string |
| position | string |
| image | string |
| description | text |

---

#### settings

| Column | Type |
|---------|------|
| id | bigint |
| website_name | string |
| logo | string |
| banner | string |
| address | text |
| whatsapp | string |
| email | string |

---

## Sitemap

```txt
/
├── Home
├── Tentang Kami
├── Kegiatan
│   └── Detail Kegiatan
├── Pengumuman
│   └── Detail Pengumuman
├── Galeri
├── UMKM Warga
├── Kontak
└── Login Admin
```

---

## Future Improvement

Planned Features:
- Pendaftaran Event Online
- Kalender Kegiatan
- Kas Karang Taruna
- QR Attendance
- Notifikasi WhatsApp
- Multi RT Support

---

## Project Goals

Website ini dibuat untuk membantu Karang Taruna RT menjadi lebih modern, informatif, dan terorganisir dalam menyampaikan informasi kepada masyarakat.
