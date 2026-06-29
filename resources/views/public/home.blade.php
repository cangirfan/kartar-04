@extends('layouts.public')

@section('content')
@php
    $heroImage = !empty($gSettings->banner)
        ? (str_starts_with($gSettings->banner, 'http') ? $gSettings->banner : asset('storage/' . $gSettings->banner))
        : null;
@endphp

<section class="relative isolate overflow-hidden bg-slate-950 text-white">
    @if($heroImage)
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: linear-gradient(120deg, rgba(2, 6, 23, 0.86), rgba(15, 23, 42, 0.74)), url('{{ $heroImage }}');"></div>
    @else
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(99,102,241,0.35),_transparent_32%),radial-gradient(circle_at_bottom_right,_rgba(16,185,129,0.28),_transparent_35%)]"></div>
        <div class="absolute inset-0 bg-[linear-gradient(120deg,rgba(15,23,42,0.95),rgba(2,6,23,0.92))]"></div>
    @endif

    <div class="relative mx-auto flex min-h-[75vh] max-w-7xl items-center px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="grid gap-12 lg:grid-cols-[1.15fr_0.85fr] lg:items-center">
            <div class="max-w-2xl space-y-8">
                <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-4 py-2 text-sm font-semibold text-indigo-200 backdrop-blur-sm">
                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                    Portal Informasi Resmi {{ $gSettings->website_name ?? 'Karang Taruna RT' }}
                </div>

                <div class="space-y-4">
                    <h1 class="text-4xl font-black tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Menyatu dalam gerak, bersinar dalam pelayanan.
                    </h1>
                    <p class="max-w-xl text-lg leading-8 text-slate-300 sm:text-xl">
                        Jelajahi kegiatan, pengumuman, galeri, dan potensi UMKM warga dalam satu halaman yang lebih modern, cepat, dan informatif.
                    </p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ url('/kegiatan') }}" class="rounded-2xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/30 transition hover:-translate-y-0.5 hover:bg-indigo-500">
                        Lihat Kegiatan
                    </a>
                    <a href="{{ url('/pengumuman') }}" class="rounded-2xl border border-white/15 bg-white/10 px-6 py-3 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/20">
                        Baca Pengumuman
                    </a>
                </div>

                <div class="grid gap-3 sm:grid-cols-3">
                    <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur-sm">
                        <p class="text-2xl font-bold text-white">{{ $posts->count() }}</p>
                        <p class="mt-1 text-sm text-slate-300">Kegiatan</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur-sm">
                        <p class="text-2xl font-bold text-white">{{ $announcements->count() }}</p>
                        <p class="mt-1 text-sm text-slate-300">Pengumuman</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur-sm">
                        <p class="text-2xl font-bold text-white">{{ $galleries->count() }}</p>
                        <p class="mt-1 text-sm text-slate-300">Galeri</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/10 p-6 shadow-2xl shadow-slate-950/30 backdrop-blur-xl">
                <div class="rounded-[1.5rem] border border-white/10 bg-slate-950/60 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-300">Siap memberi manfaat</p>
                            <h2 class="mt-2 text-2xl font-bold text-white">Akses cepat ke semua informasi</h2>
                        </div>
                        <div class="rounded-2xl bg-emerald-500/15 p-3 text-emerald-300">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6-6m6 6l-6 6" />
                            </svg>
                        </div>
                    </div>

                    <div class="mt-8 space-y-3">
                        <a href="{{ url('/tentang-kami') }}" class="flex items-center justify-between rounded-2xl border border-white/10 bg-white/5 px-4 py-4 text-sm font-semibold text-slate-100 transition hover:bg-white/10">
                            <span>Profil organisasi</span>
                            <span class="text-indigo-300">→</span>
                        </a>
                        <a href="{{ url('/umkm') }}" class="flex items-center justify-between rounded-2xl border border-white/10 bg-white/5 px-4 py-4 text-sm font-semibold text-slate-100 transition hover:bg-white/10">
                            <span>UMKM warga</span>
                            <span class="text-emerald-300">→</span>
                        </a>
                        <a href="{{ url('/galeri') }}" class="flex items-center justify-between rounded-2xl border border-white/10 bg-white/5 px-4 py-4 text-sm font-semibold text-slate-100 transition hover:bg-white/10">
                            <span>Galeri dokumentasi</span>
                            <span class="text-indigo-300">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="bg-white py-20 dark:bg-slate-900">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
            <div class="space-y-5">
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Tentang kami</p>
                <h2 class="text-3xl font-black tracking-tight text-slate-900 dark:text-white sm:text-4xl">
                    Wadah pemuda yang aktif, terbuka, dan penuh manfaat.
                </h2>
                <p class="max-w-2xl text-lg leading-8 text-slate-600 dark:text-slate-300">
                    Kami hadir untuk menghubungkan warga, menyebarkan informasi, dan menggerakkan kegiatan bersama yang menciptakan lingkungan yang lebih hidup dan harmonis.
                </p>
                <a href="{{ url('/tentang-kami') }}" class="inline-flex items-center gap-2 rounded-full border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-indigo-200 hover:text-indigo-600 dark:border-slate-700 dark:text-slate-200">
                    Kenali organisasi kami
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950/60">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-100 text-indigo-600 dark:bg-indigo-950/60 dark:text-indigo-300">✦</div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900 dark:text-white">Program terarah</h3>
                    <p class="mt-2 text-sm leading-7 text-slate-600 dark:text-slate-300">Setiap kegiatan dibuat untuk memberikan dampak nyata bagi warga dan lingkungan sekitar.</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950/60">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-300">☼</div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900 dark:text-white">Komunikasi terbuka</h3>
                    <p class="mt-2 text-sm leading-7 text-slate-600 dark:text-slate-300">Informasi penting disampaikan secara cepat dan mudah diakses oleh seluruh warga.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-slate-50 py-20 dark:bg-slate-950">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Kegiatan terbaru</p>
                <h2 class="mt-2 text-3xl font-black tracking-tight text-slate-900 dark:text-white">Aktivitas yang sedang berjalan</h2>
            </div>
            <a href="{{ url('/kegiatan') }}" class="text-sm font-semibold text-indigo-600 transition hover:text-indigo-700 dark:text-indigo-400">Lihat semua kegiatan →</a>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            @forelse($posts as $post)
                <article class="flex h-full flex-col overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl dark:border-slate-800 dark:bg-slate-900">
                    <div class="relative aspect-video bg-slate-100 dark:bg-slate-800">
                        @if(!empty($post->thumbnail))
                            <img class="h-full w-full object-cover" src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                        @else
                            <div class="flex h-full items-center justify-center bg-gradient-to-br from-indigo-100 to-emerald-50 text-slate-400 dark:from-indigo-950/80 dark:to-slate-900">
                                <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                            </div>
                        @endif
                        <span class="absolute left-4 top-4 rounded-full bg-indigo-600 px-3 py-1 text-xs font-bold text-white">{{ $post->category }}</span>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <p class="text-sm text-slate-400 dark:text-slate-500">{{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}</p>
                        <h3 class="mt-3 text-xl font-bold text-slate-900 dark:text-white">{{ $post->title }}</h3>
                        <p class="mt-3 flex-1 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 140) }}</p>
                        <a href="{{ url('/kegiatan/' . $post->slug) }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-indigo-600 transition hover:text-indigo-700 dark:text-indigo-400">Baca selengkapnya <span>→</span></a>
                    </div>
                </article>
            @empty
                <div class="md:col-span-3 rounded-3xl border border-dashed border-slate-300 bg-white p-10 text-center text-slate-500 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-400">
                    Belum ada kegiatan yang dipublikasikan.
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="bg-white py-20 dark:bg-slate-900">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.1fr_0.9fr] lg:px-8">
        <div class="rounded-[2rem] border border-slate-200 bg-slate-50 p-8 shadow-sm dark:border-slate-800 dark:bg-slate-950/60">
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-emerald-600">Pengumuman</p>
            <h2 class="mt-3 text-3xl font-black tracking-tight text-slate-900 dark:text-white">Informasi penting untuk warga</h2>
            <div class="mt-8 space-y-4">
                @forelse($announcements as $announcement)
                    <a href="{{ url('/pengumuman/' . $announcement->slug) }}" class="block rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-indigo-200 hover:shadow-sm dark:border-slate-800 dark:bg-slate-900">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">{{ $announcement->title }}</p>
                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $announcement->description }}</p>
                            </div>
                            <span class="text-sm font-semibold text-indigo-600 dark:text-indigo-400">Baca</span>
                        </div>
                    </a>
                @empty
                    <div class="rounded-2xl border border-dashed border-slate-300 p-6 text-sm text-slate-500 dark:border-slate-700 dark:text-slate-400">
                        Belum ada pengumuman terbaru.
                    </div>
                @endforelse
            </div>
        </div>

        <div class="rounded-[2rem] border border-slate-200 bg-gradient-to-br from-indigo-600 to-emerald-500 p-8 text-white shadow-lg">
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-100">Ayo ikut berkontribusi</p>
            <h2 class="mt-3 text-3xl font-black tracking-tight">Jadikan lingkungan lebih aktif dan bersahabat</h2>
            <p class="mt-4 text-lg leading-8 text-indigo-50">
                Dari kegiatan sosial, kerja bakti, sampai promosi UMKM, setiap kontribusi warga akan memperkuat semangat kebersamaan.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ url('/kontak') }}" class="rounded-2xl bg-white px-5 py-3 text-sm font-semibold text-indigo-700 transition hover:bg-indigo-50">Hubungi kami</a>
                <a href="{{ url('/umkm') }}" class="rounded-2xl border border-white/30 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10">Lihat UMKM</a>
            </div>
        </div>
    </div>
</section>

<section class="bg-slate-50 py-20 dark:bg-slate-950">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Galeri</p>
                <h2 class="mt-2 text-3xl font-black tracking-tight text-slate-900 dark:text-white">Dokumentasi kegiatan yang berkesan</h2>
            </div>
            <a href="{{ url('/galeri') }}" class="text-sm font-semibold text-indigo-600 transition hover:text-indigo-700 dark:text-indigo-400">Lihat galeri lengkap →</a>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            @forelse($galleries as $gallery)
                <div class="group overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl dark:border-slate-800 dark:bg-slate-900">
                    <div class="aspect-square overflow-hidden bg-slate-100 dark:bg-slate-800">
                        @if(!empty($gallery->image))
                            <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105" src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                        @else
                            <div class="flex h-full items-center justify-center text-slate-400 dark:text-slate-500">{{ $gallery->title }}</div>
                        @endif
                    </div>
                    <div class="p-5">
                        <p class="text-sm font-semibold text-indigo-600">{{ $gallery->category }}</p>
                        <h3 class="mt-2 text-lg font-bold text-slate-900 dark:text-white">{{ $gallery->title }}</h3>
                    </div>
                </div>
            @empty
                <div class="md:col-span-3 rounded-3xl border border-dashed border-slate-300 bg-white p-10 text-center text-slate-500 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-400">
                    Belum ada foto dokumentasi di galeri.
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="bg-slate-900 py-16 text-white">
    <div class="mx-auto flex max-w-7xl flex-col gap-6 px-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-300">Mulai jelajahi</p>
            <h2 class="mt-2 text-3xl font-black tracking-tight">Ingin melihat semua sisi kegiatan kami?</h2>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ url('/kegiatan') }}" class="rounded-2xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:bg-slate-100">Lihat kegiatan</a>
            <a href="{{ url('/kontak') }}" class="rounded-2xl border border-white/20 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10">Hubungi kami</a>
        </div>
    </div>
</section>
@endsection
