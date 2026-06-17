@extends('layouts.public')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden bg-slate-900 text-white py-24 sm:py-32">
    <!-- Decorative background elements -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-indigo-900/50 via-slate-900 to-slate-950"></div>
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-indigo-600 rounded-full blur-3xl opacity-20"></div>
    <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-emerald-500 rounded-full blur-3xl opacity-20"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-8 max-w-3xl mx-auto">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">
                <span class="h-1.5 w-1.5 rounded-full bg-indigo-400 animate-pulse"></span>
                Official Portal Karang Taruna
            </span>
            <h1 class="text-4xl sm:text-6xl font-black tracking-tight leading-none bg-gradient-to-r from-white via-indigo-100 to-emerald-200 bg-clip-text text-transparent">
                Karya Pemuda, Kemajuan Bangsa
            </h1>
            <p class="text-lg sm:text-xl text-slate-300 font-light leading-relaxed">
                Selamat datang di platform digital resmi {{ $gSettings->website_name ?? 'Karang Taruna RT' }}. Wadah kreativitas, kolaborasi, dan informasi kepemudaan untuk pengabdian masyarakat.
            </p>
            <div class="flex flex-wrap justify-center gap-4 pt-4">
                <a href="{{ url('/kegiatan') }}" class="px-8 py-4 rounded-xl text-sm font-bold bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-500 hover:to-indigo-400 text-white shadow-lg shadow-indigo-600/30 transition-all duration-200 hover:-translate-y-0.5">
                    Lihat Kegiatan
                </a>
                <a href="{{ url('/tentang-kami') }}" class="px-8 py-4 rounded-xl text-sm font-bold bg-slate-800/80 hover:bg-slate-800 text-white border border-slate-700 hover:border-slate-600 transition-all duration-200 hover:-translate-y-0.5 backdrop-blur-sm">
                    Profil Organisasi
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Sambutan Ketua -->
<div class="py-20 bg-white dark:bg-slate-900 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-indigo-50/50 to-emerald-50/30 dark:from-indigo-950/10 dark:to-emerald-950/5 rounded-3xl p-8 sm:p-12 border border-slate-100 dark:border-slate-800 shadow-sm flex flex-col lg:flex-row gap-12 items-center">
            <div class="w-48 h-48 sm:w-64 sm:h-64 rounded-2xl overflow-hidden shadow-lg border-4 border-white dark:border-slate-800 flex-shrink-0 bg-slate-100 dark:bg-slate-800">
                <!-- Check if logo/avatar is available, otherwise show placeholder icon -->
                <div class="h-full w-full bg-gradient-to-tr from-indigo-600 to-emerald-500 flex items-center justify-center text-white text-7xl font-bold">
                    👨‍💼
                </div>
            </div>
            <div class="space-y-6">
                <span class="text-xs font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">Kata Sambutan</span>
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                    Sambutan Ketua Karang Taruna
                </h2>
                <div class="prose prose-slate dark:prose-invert max-w-none text-slate-600 dark:text-slate-300 text-base leading-relaxed">
                    <p>
                        "Salam pemuda! Senang sekali rasanya kami dapat menghadirkan portal informasi digital ini kepada seluruh warga. Melalui website ini, kami berkomitmen untuk mewujudkan Karang Taruna yang transparan, aktif, dan inovatif dalam melayani masyarakat."
                    </p>
                    <p>
                        Kami mengajak seluruh pemuda dan pemudi di lingkungan RT untuk ikut berpartisipasi aktif dalam setiap program kerja, berkolaborasi mengembangkan potensi daerah, serta memajukan perekonomian warga melalui program kemitraan UMKM. Bersama-sama, mari kita jadikan lingkungan kita lebih asri, kreatif, dan sejahtera.
                    </p>
                </div>
                <div class="pt-2">
                    <h4 class="font-bold text-slate-900 dark:text-white text-lg">Aditya Pratama</h4>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Ketua Karang Taruna RT 05</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Highlight Kegiatan Terbaru -->
<div class="py-20 bg-slate-50 dark:bg-slate-950 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-12">
            <div class="space-y-3">
                <span class="text-xs font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">Aktivitas Pemuda</span>
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                    Kegiatan Terbaru
                </h2>
                <p class="text-slate-500 dark:text-slate-400 max-w-xl">
                    Intip dokumentasi dan keseruan dari program-program sosial, kepemudaan, dan kebersihan lingkungan yang telah kami laksanakan.
                </p>
            </div>
            <div>
                <a href="{{ url('/kegiatan') }}" class="inline-flex items-center gap-2 text-sm font-bold text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors duration-200 group">
                    Semua Kegiatan
                    <svg class="h-4 w-4 transform transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <article class="bg-white dark:bg-slate-900 rounded-2xl overflow-hidden border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-md transition-all duration-300 group flex flex-col h-full">
                    <!-- Image -->
                    <div class="relative aspect-video bg-slate-100 dark:bg-slate-800 overflow-hidden flex-shrink-0">
                        @if(!empty($post->thumbnail))
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-indigo-100 to-indigo-50 dark:from-indigo-950 dark:to-slate-900 flex items-center justify-center text-slate-400 dark:text-slate-600">
                                <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                            </div>
                        @endif
                        <span class="absolute top-4 left-4 inline-flex px-3 py-1 rounded-full text-xs font-bold bg-indigo-600 text-white shadow-sm">
                            {{ $post->category }}
                        </span>
                    </div>
                    <!-- Body -->
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 text-xs text-slate-400 dark:text-slate-500 mb-3">
                            <span>{{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 line-clamp-2 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200">
                            <a href="{{ url('/kegiatan/' . $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed mb-6 line-clamp-3 flex-grow">
                            {{ strip_tags($post->content) }}
                        </p>
                        <a href="{{ url('/kegiatan/' . $post->slug) }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors duration-200 mt-auto">
                            Baca Selengkapnya
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-500">
                    Belum ada kegiatan yang dipublikasikan.
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Pengumuman & Info Warga -->
<div class="py-20 bg-white dark:bg-slate-900 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Left Info Block -->
            <div class="lg:col-span-1 space-y-6">
                <span class="text-xs font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">Update Warga</span>
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                    Papan Pengumuman
                </h2>
                <p class="text-slate-500 dark:text-slate-400 leading-relaxed">
                    Dapatkan informasi terbaru mengenai rapat RT, jadwal kerja bakti, informasi bantuan sosial, maupun agenda RT lainnya secara berkala.
                </p>
                <div class="pt-4">
                    <a href="{{ url('/pengumuman') }}" class="px-6 py-3 rounded-xl text-sm font-bold bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-800 dark:text-white transition-colors duration-200 inline-block border border-slate-200/50 dark:border-slate-700/50">
                        Lihat Semua Pengumuman
                    </a>
                </div>
            </div>
            
            <!-- Announcements list -->
            <div class="lg:col-span-2 space-y-6">
                @forelse($announcements as $announcement)
                    <div class="p-6 rounded-2xl border border-slate-100 dark:border-slate-800 hover:border-indigo-100 dark:hover:border-indigo-950 bg-slate-50/50 dark:bg-slate-950/20 hover:bg-white dark:hover:bg-slate-900 shadow-sm transition-all duration-300 group">
                        <div class="flex flex-col sm:flex-row justify-between sm:items-start gap-4">
                            <div class="space-y-2">
                                <div class="flex items-center gap-3">
                                    <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span class="text-xs font-bold text-slate-400 dark:text-slate-500">
                                        {{ $announcement->published_at ? $announcement->published_at->format('d M Y') : $announcement->created_at->format('d M Y') }}
                                    </span>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-200">
                                    <a href="{{ url('/pengumuman/' . $announcement->slug) }}">
                                        {{ $announcement->title }}
                                    </a>
                                </h3>
                                <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 leading-relaxed">
                                    {{ $announcement->description }}
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="{{ url('/pengumuman/' . $announcement->slug) }}" class="h-10 w-10 rounded-lg bg-indigo-50 dark:bg-indigo-950/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-200">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 text-slate-500">
                        Belum ada pengumuman terbaru.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Gallery Preview -->
<div class="py-20 bg-slate-50 dark:bg-slate-950 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-12">
            <div class="space-y-3">
                <span class="text-xs font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">Dokumentasi</span>
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                    Galeri Dokumentasi
                </h2>
            </div>
            <div>
                <a href="{{ url('/galeri') }}" class="inline-flex items-center gap-2 text-sm font-bold text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors duration-200 group">
                    Lihat Galeri Foto
                    <svg class="h-4 w-4 transform transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($galleries as $gallery)
                <div class="relative group aspect-square rounded-2xl overflow-hidden bg-slate-100 dark:bg-slate-800 shadow-sm hover:shadow-md transition-all duration-300">
                    @if(!empty($gallery->image))
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-slate-200 to-slate-100 dark:from-slate-800 dark:to-slate-900 flex flex-col items-center justify-center text-slate-400 dark:text-slate-600 p-4">
                            <span class="text-4xl mb-2">📸</span>
                            <span class="text-xs font-bold text-center leading-tight">{{ $gallery->title }}</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-slate-950/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <span class="text-xs text-indigo-400 font-bold uppercase tracking-wider mb-1">{{ $gallery->category }}</span>
                        <h4 class="text-white font-bold text-sm sm:text-base leading-tight">{{ $gallery->title }}</h4>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-500">
                    Belum ada foto dokumentasi di galeri.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
