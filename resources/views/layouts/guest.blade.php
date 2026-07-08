<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-900 antialiased">
        <div class="min-h-screen bg-slate-950 lg:grid lg:grid-cols-[minmax(0,1fr)_520px]">
            <section class="relative hidden overflow-hidden lg:flex lg:flex-col lg:justify-between p-10 text-white">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(34,197,94,0.24),transparent_28%),radial-gradient(circle_at_80%_5%,rgba(59,130,246,0.22),transparent_32%),linear-gradient(135deg,#0f172a_0%,#111827_48%,#064e3b_100%)]"></div>
                <div class="absolute inset-x-0 bottom-0 h-72 bg-gradient-to-t from-slate-950 to-transparent"></div>

                <div class="relative z-10 flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-slate-950 shadow-2xl shadow-emerald-950/30">
                        <x-application-logo class="h-7 w-7 fill-current" />
                    </div>
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.28em] text-emerald-200">Admin Panel</p>
                        <h1 class="text-2xl font-extrabold tracking-tight">Karang Taruna RT</h1>
                    </div>
                </div>

                <div class="relative z-10 max-w-2xl space-y-8">
                    <div class="space-y-4">
                        <p class="text-sm font-bold uppercase tracking-[0.28em] text-emerald-200">Ruang kerja pengurus</p>
                        <h2 class="text-5xl font-extrabold leading-tight tracking-tight">Kelola kegiatan warga dengan lebih tenang dan rapi.</h2>
                        <p class="max-w-xl text-base leading-8 text-slate-200">Masuk untuk memperbarui kegiatan, pengumuman, galeri, UMKM, pengurus, dan pengaturan website dari satu tempat.</p>
                    </div>

                    <div class="grid max-w-xl grid-cols-3 gap-3">
                        <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur">
                            <p class="text-2xl font-extrabold">01</p>
                            <p class="mt-1 text-xs font-semibold uppercase tracking-wider text-slate-300">Kegiatan</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur">
                            <p class="text-2xl font-extrabold">02</p>
                            <p class="mt-1 text-xs font-semibold uppercase tracking-wider text-slate-300">Pengumuman</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur">
                            <p class="text-2xl font-extrabold">03</p>
                            <p class="mt-1 text-xs font-semibold uppercase tracking-wider text-slate-300">Galeri</p>
                        </div>
                    </div>
                </div>

                <p class="relative z-10 text-sm font-medium text-slate-300">{{ config('app.name', 'Kartar RW') }} &copy; {{ date('Y') }}</p>
            </section>

            <main class="flex min-h-screen items-center justify-center bg-slate-50 px-5 py-10 sm:px-8 lg:bg-white">
                <div class="w-full max-w-md">
                    <div class="mb-8 flex items-center justify-center lg:hidden">
                        <a href="/" class="flex items-center gap-3">
                            <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-900 text-white shadow-lg shadow-slate-900/20">
                                <x-application-logo class="h-6 w-6 fill-current" />
                            </span>
                            <span class="text-lg font-extrabold text-slate-900">Karang Taruna RT</span>
                        </a>
                    </div>

                    <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/70 sm:p-8 lg:border-slate-100 lg:shadow-none">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>