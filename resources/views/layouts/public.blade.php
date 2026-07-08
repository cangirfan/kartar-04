<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $gSettings->website_name ?? 'Karang Taruna RT')</title>
    
    <!-- Meta Descriptions for SEO -->
    <meta name="description" content="Website Resmi Informasi Kegiatan, Pengumuman, Struktur Organisasi, Galeri, dan UMKM Warga Karang Taruna tingkat RT.">
    <meta name="keywords" content="karang taruna, rt, kegiatan warga, pengumuman rt, umkm warga, portal rt">
    <meta name="author" content="Karang Taruna">

    @php
        $siteFavicon = !empty($gSettings->logo)
            ? (str_starts_with($gSettings->logo, 'http') ? $gSettings->logo : asset('storage/' . $gSettings->logo))
            : asset('favicon.ico');
    @endphp
    <link rel="icon" href="{{ $siteFavicon }}">
    <link rel="shortcut icon" href="{{ $siteFavicon }}">
    <link rel="apple-touch-icon" href="{{ $siteFavicon }}">

    <!-- Google Fonts: Inter & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 dark:bg-slate-950 dark:text-slate-100 flex flex-col min-h-screen transition-colors duration-300">
    <!-- Navigation -->
    <header class="sticky top-0 z-50 backdrop-blur-md bg-white/80 dark:bg-slate-900/80 border-b border-slate-100 dark:border-slate-800 transition-colors duration-300" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                        @if(!empty($gSettings->logo))
                            <img class="h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-105" src="{{ asset('storage/' . $gSettings->logo) }}" alt="{{ $gSettings->website_name }}">
                        @else
                            <div class="h-10 w-10 rounded-xl bg-gradient-to-tr from-indigo-600 to-emerald-500 flex items-center justify-center text-white font-extrabold text-lg shadow-md transition-transform duration-300 group-hover:scale-105">
                                K
                            </div>
                        @endif
                        <span class="font-bold text-xl tracking-tight bg-gradient-to-r from-indigo-600 to-emerald-500 bg-clip-text text-transparent group-hover:opacity-90">
                            {{ $gSettings->website_name ?? 'Karang Taruna' }}
                        </span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-1 items-center">
                    <a href="{{ url('/') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ Request::is('/') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-slate-100/50 dark:hover:bg-slate-800/50' }}">Home</a>
                    <a href="{{ url('/tentang-kami') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ Request::is('tentang-kami') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-slate-100/50 dark:hover:bg-slate-800/50' }}">Tentang Kami</a>
                    <a href="{{ url('/kegiatan') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ Request::is('kegiatan*') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-slate-100/50 dark:hover:bg-slate-800/50' }}">Kegiatan</a>
                    <a href="{{ url('/pengumuman') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ Request::is('pengumuman*') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-slate-100/50 dark:hover:bg-slate-800/50' }}">Pengumuman</a>
                    <a href="{{ url('/galeri') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ Request::is('galeri*') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-slate-100/50 dark:hover:bg-slate-800/50' }}">Galeri</a>
                    <a href="{{ url('/umkm') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ Request::is('umkm*') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-slate-100/50 dark:hover:bg-slate-800/50' }}">UMKM Warga</a>
                    <a href="{{ url('/kontak') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ Request::is('kontak*') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-slate-100/50 dark:hover:bg-slate-800/50' }}">Kontak</a>
                </nav>

                <!-- Right Action Button -->
                <div class="hidden md:flex items-center gap-3">
                    <button @click="$dispatch('open-donation-modal')" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-bold text-white bg-rose-500 hover:bg-rose-600 shadow-md shadow-rose-500/20 transition-all duration-200 transform hover:scale-[1.02]">
                       
                        Donasi
                    </button>
                   
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-slate-800 focus:outline-none transition-colors duration-200" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" x-show="!open" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="h-6 w-6" x-show="open" style="display: none;" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden border-t border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900" x-show="open" style="display: none;" @click.away="open = false" x-transition>
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ url('/') }}" class="block px-4 py-2.5 rounded-lg text-base font-semibold {{ Request::is('/') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300' }}">Home</a>
                <a href="{{ url('/tentang-kami') }}" class="block px-4 py-2.5 rounded-lg text-base font-semibold {{ Request::is('tentang-kami') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300' }}">Tentang Kami</a>
                <a href="{{ url('/kegiatan') }}" class="block px-4 py-2.5 rounded-lg text-base font-semibold {{ Request::is('kegiatan*') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300' }}">Kegiatan</a>
                <a href="{{ url('/pengumuman') }}" class="block px-4 py-2.5 rounded-lg text-base font-semibold {{ Request::is('pengumuman*') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300' }}">Pengumuman</a>
                <a href="{{ url('/galeri') }}" class="block px-4 py-2.5 rounded-lg text-base font-semibold {{ Request::is('galeri*') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300' }}">Galeri</a>
                <a href="{{ url('/umkm') }}" class="block px-4 py-2.5 rounded-lg text-base font-semibold {{ Request::is('umkm*') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300' }}">UMKM Warga</a>
                <a href="{{ url('/kontak') }}" class="block px-4 py-2.5 rounded-lg text-base font-semibold {{ Request::is('kontak*') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/50 dark:bg-indigo-950/30' : 'text-slate-600 dark:text-slate-300' }}">Kontak</a>
                <div class="border-t border-slate-100 dark:border-slate-800 my-2 pt-2 flex flex-col gap-2">
                    <button @click="$dispatch('open-donation-modal'); open = false" class="inline-flex items-center justify-center gap-2 text-center w-full px-4 py-2.5 rounded-lg text-base font-bold text-white bg-rose-500 hover:bg-rose-600">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                        </svg>
                        Donasi Peduli RT
                    </button>
                    @auth
                        <a href="{{ route('dashboard') }}" class="block text-center w-full px-4 py-2.5 rounded-lg text-base font-bold text-white bg-indigo-600 hover:bg-indigo-700">
                            Dashboard Admin
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="block text-center w-full px-4 py-2.5 rounded-lg text-base font-bold text-indigo-600 dark:text-indigo-400 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800">
                            Login Admin
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 border-t border-slate-800 py-12 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About Col -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        @if(!empty($gSettings->logo))
                            <img class="h-8 w-auto object-contain" src="{{ asset('storage/' . $gSettings->logo) }}" alt="{{ $gSettings->website_name }}">
                        @else
                            <div class="h-8 w-8 rounded-lg bg-gradient-to-tr from-indigo-600 to-emerald-500 flex items-center justify-center text-white font-extrabold text-sm shadow-md">
                                K
                            </div>
                        @endif
                        <span class="font-bold text-lg text-white tracking-tight">
                            {{ $gSettings->website_name ?? 'Karang Taruna' }}
                        </span>
                    </div>
                    <p class="text-sm leading-relaxed">
                        Pusat komunikasi, aktivitas pemuda, dan penyebaran informasi kegiatan sosial kemasyarakatan tingkat RT.
                    </p>
                </div>

                <!-- Navigation Links -->
                <div>
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4">Navigasi</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ url('/') }}" class="hover:text-indigo-400 transition-colors duration-200">Home</a></li>
                        <li><a href="{{ url('/tentang-kami') }}" class="hover:text-indigo-400 transition-colors duration-200">Tentang Kami</a></li>
                        <li><a href="{{ url('/kegiatan') }}" class="hover:text-indigo-400 transition-colors duration-200">Kegiatan</a></li>
                        <li><a href="{{ url('/pengumuman') }}" class="hover:text-indigo-400 transition-colors duration-200">Pengumuman</a></li>
                    </ul>
                </div>

                <!-- Other Links -->
                <div>
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4">Lainnya</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ url('/galeri') }}" class="hover:text-indigo-400 transition-colors duration-200">Galeri Foto</a></li>
                        <li><a href="{{ url('/umkm') }}" class="hover:text-indigo-400 transition-colors duration-200">UMKM Warga</a></li>
                        <li><a href="{{ url('/kontak') }}" class="hover:text-indigo-400 transition-colors duration-200">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Contacts -->
                <div class="space-y-3">
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4">Sekretariat</h3>
                    <p class="text-sm leading-relaxed">
                        {{ $gSettings->address ?? 'Alamat Sekretariat Karang Taruna RT.' }}
                    </p>
                    <div class="pt-2 space-y-2">
                        @if(!empty($gSettings->whatsapp))
                            <a href="https://wa.me/{{ $gSettings->whatsapp }}" target="_blank" class="flex items-center gap-2 text-sm hover:text-emerald-400 transition-colors duration-200">
                                <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.746.953 3.71 1.458 5.704 1.459h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                <span>+{{ $gSettings->whatsapp }}</span>
                            </a>
                        @endif
                        @if(!empty($gSettings->email))
                            <a href="mailto:{{ $gSettings->email }}" class="flex items-center gap-2 text-sm hover:text-indigo-400 transition-colors duration-200">
                                <svg class="h-4 w-4 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <span>{{ $gSettings->email }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="border-t border-slate-800 mt-12 pt-6 text-center text-xs space-y-1">
                <p>&copy; {{ date('Y') }} {{ $gSettings->website_name ?? 'Karang Taruna RT' }}. All rights reserved.</p>
                <p>Website ini dikembangkan untuk profesionalitas dan kemudahan informasi masyarakat.</p>
            </div>
        </div>
    </footer>

    <!-- Donation Modal -->
    <div x-data="{ 
            showModal: false,
            open() { this.showModal = true },
            close() { this.showModal = false },
         }" 
         @open-donation-modal.window="open()" 
         @keydown.escape.window="close()"
         class="fixed inset-0 z-50" 
         x-cloak
         x-show="showModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/60 dark:bg-slate-950/80 backdrop-blur-sm" aria-hidden="true"></div>

        <!-- Modal Wrapper -->
        <div class="fixed inset-0 overflow-y-auto flex items-center justify-center p-4" @click.self="close()">
            <div class="bg-white dark:bg-slate-900 rounded-3xl max-w-md w-full border border-slate-100 dark:border-slate-800 shadow-2xl p-6 sm:p-8 transform transition-all relative"
                 x-show="showModal"
                 @click.stop
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                
                <!-- Close Button -->
                <button type="button" @click.stop="close()" aria-label="Tutup modal donasi" class="absolute top-4 right-4 p-2 rounded-full text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Modal Content -->
                <div class="text-center space-y-5">
                    <!-- Icon -->
                    <div class="mx-auto h-12 w-12 rounded-full bg-rose-50 dark:bg-rose-950/50 flex items-center justify-center text-rose-500">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                        </svg>
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-xl font-extrabold text-slate-900 dark:text-white leading-tight">Donasi Peduli Karang Taruna</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Dukungan donasi Anda akan dialokasikan penuh untuk kegiatan kepemudaan, sosial kemasyarakatan, dan perbaikan lingkungan RT 04.</p>
                    </div>

                    <!-- Barcode/QR Code Display -->
                    <div class="p-4 bg-slate-50 dark:bg-slate-950 border border-slate-100 dark:border-slate-800 rounded-2xl flex flex-col items-center justify-center space-y-3 shadow-inner">
                        @if(!empty($gSettings->donation_qr))
                            <img class="w-64 h-64 object-contain rounded-xl shadow-md border border-white dark:border-slate-800" src="{{ asset('storage/' . $gSettings->donation_qr) }}" alt="QRIS Donasi">
                        @else
                            <div class="w-64 h-64 bg-slate-200 dark:bg-slate-800 rounded-xl flex items-center justify-center text-slate-400 text-sm font-semibold">
                                Belum Ada Barcode Donasi
                            </div>
                        @endif
                        <span class="text-xs font-bold text-slate-400 dark:text-slate-500 tracking-widest uppercase">SCAN QRIS UNTUK BERDONASI</span>
                    </div>

                    <div class="text-xs text-slate-400 dark:text-slate-500 space-y-1">
                        <p>Mendukung metode pembayaran GoPay, OVO, Dana, LinkAja, ShopeePay, serta seluruh aplikasi Mobile Banking.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const trigger = document.getElementById('infinite-scroll-trigger');
            if (!trigger) return;

            let nextPageUrl = '';
            let hasNextPage = true;
            let isLoading = false;

            const updateNextPageUrl = () => {
                const nextLink = document.querySelector('#pagination-links a[rel="next"]');
                nextPageUrl = nextLink ? nextLink.href : '';
                hasNextPage = !!nextPageUrl;
                if (!hasNextPage) {
                    trigger.style.display = 'none';
                } else {
                    trigger.style.display = 'flex';
                }
            };

            updateNextPageUrl();

            if (!hasNextPage) return;

            const loadMore = async () => {
                if (isLoading || !hasNextPage) return;
                isLoading = true;
                
                const spinner = trigger.querySelector('.spinner-svg');
                const spinnerText = trigger.querySelector('.spinner-text');
                if (spinner) spinner.classList.remove('hidden');
                if (spinnerText) spinnerText.classList.remove('hidden');

                try {
                    const response = await fetch(nextPageUrl);
                    const html = await response.text();
                    
                    // Add an intentional delay of 800ms so the user can see the loading state
                    await new Promise(resolve => setTimeout(resolve, 800));

                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    
                    const newItems = doc.querySelectorAll('#items-grid > *');
                    const grid = document.getElementById('items-grid');
                    
                    newItems.forEach((item, index) => {
                        // Apply initial transition classes for smooth entry
                        item.classList.add('opacity-0', 'translate-y-4', 'transition-all', 'duration-500', 'ease-out');
                        grid.appendChild(item);
                        
                        // Stagger the card fade-in animation
                        setTimeout(() => {
                            item.classList.remove('opacity-0', 'translate-y-4');
                            item.classList.add('opacity-100', 'translate-y-0');
                        }, 50 + (index * 120)); // staggered delay per item (120ms intervals)

                        // Initialize Alpine JS on new DOM nodes if window.Alpine is available
                        if (window.Alpine) {
                            window.Alpine.initTree(item);
                        }
                    });

                    const newPagination = doc.getElementById('pagination-links');
                    if (newPagination) {
                        document.getElementById('pagination-links').innerHTML = newPagination.innerHTML;
                    }

                    updateNextPageUrl();
                } catch (error) {
                    console.error('Infinite scroll loading failed:', error);
                } finally {
                    isLoading = false;
                    if (spinner) spinner.classList.add('hidden');
                    if (spinnerText) spinnerText.classList.add('hidden');
                }
            };

            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting && !isLoading && hasNextPage) {
                    loadMore();
                }
            }, {
                rootMargin: '150px',
            });

            observer.observe(trigger);
        });
    </script>
</body>
</html>

