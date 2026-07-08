<x-app-layout>
    <x-slot name="header">
        <div class="space-y-1">
            <p class="text-xs font-bold uppercase tracking-[0.22em] text-emerald-600 dark:text-emerald-400">Dashboard Admin</p>
            <h2 class="text-2xl font-extrabold tracking-tight text-slate-950 dark:text-white">
                Ringkasan Website
            </h2>
        </div>
    </x-slot>

    <div class="space-y-8">
        <section class="overflow-hidden rounded-[2rem] bg-slate-950 text-white shadow-xl shadow-slate-300/60 dark:shadow-none">
            <div class="grid gap-8 p-6 sm:p-8 lg:grid-cols-[1fr_320px] lg:items-center">
                <div class="space-y-5">
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-3 py-1 text-xs font-bold uppercase tracking-wider text-emerald-200">
                        <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                        Panel Pengelolaan Konten
                    </div>
                    <div class="space-y-3">
                        <h1 class="max-w-3xl text-3xl font-extrabold leading-tight tracking-tight sm:text-4xl">Kelola informasi warga dari satu dashboard yang lebih rapi.</h1>
                        <p class="max-w-2xl text-sm leading-7 text-slate-300 sm:text-base">Pantau jumlah konten, buka modul utama, dan lanjutkan pembaruan kegiatan atau pengumuman terbaru dengan cepat.</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('admin.posts.create') }}" class="rounded-2xl bg-white px-5 py-3 text-sm font-extrabold text-slate-950 shadow-lg shadow-black/20 transition hover:bg-emerald-100">Tambah Kegiatan</a>
                        <a href="{{ route('admin.announcements.create') }}" class="rounded-2xl border border-white/15 px-5 py-3 text-sm font-extrabold text-white transition hover:bg-white/10">Buat Pengumuman</a>
                    </div>
                </div>

                <div class="rounded-[1.5rem] border border-white/10 bg-white/10 p-5 backdrop-blur">
                    <p class="text-sm font-bold uppercase tracking-wider text-slate-300">Konten Terkelola</p>
                    <p class="mt-3 text-5xl font-extrabold">{{ array_sum($stats) }}</p>
                    <div class="mt-5 grid grid-cols-2 gap-3 text-sm">
                        <div class="rounded-2xl bg-white/10 p-3">
                            <p class="font-extrabold">{{ $stats['posts_count'] }}</p>
                            <p class="text-xs text-slate-300">Kegiatan</p>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-3">
                            <p class="font-extrabold">{{ $stats['announcements_count'] }}</p>
                            <p class="text-xs text-slate-300">Pengumuman</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-5">
            @php
                $cards = [
                    ['label' => 'Kegiatan', 'value' => $stats['posts_count'], 'route' => route('admin.posts.index'), 'tone' => 'border-emerald-200 bg-emerald-50 text-emerald-700 dark:border-emerald-900/70 dark:bg-emerald-950/30 dark:text-emerald-300'],
                    ['label' => 'Pengumuman', 'value' => $stats['announcements_count'], 'route' => route('admin.announcements.index'), 'tone' => 'border-sky-200 bg-sky-50 text-sky-700 dark:border-sky-900/70 dark:bg-sky-950/30 dark:text-sky-300'],
                    ['label' => 'Foto Galeri', 'value' => $stats['galleries_count'], 'route' => route('admin.galleries.index'), 'tone' => 'border-amber-200 bg-amber-50 text-amber-700 dark:border-amber-900/70 dark:bg-amber-950/30 dark:text-amber-300'],
                    ['label' => 'UMKM', 'value' => $stats['umkms_count'], 'route' => route('admin.umkms.index'), 'tone' => 'border-rose-200 bg-rose-50 text-rose-700 dark:border-rose-900/70 dark:bg-rose-950/30 dark:text-rose-300'],
                    ['label' => 'Pengurus', 'value' => $stats['managements_count'], 'route' => route('admin.managements.index'), 'tone' => 'border-violet-200 bg-violet-50 text-violet-700 dark:border-violet-900/70 dark:bg-violet-950/30 dark:text-violet-300'],
                ];
            @endphp

            @foreach($cards as $card)
                <a href="{{ $card['route'] }}" class="group rounded-3xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-xl hover:shadow-slate-200/70 dark:border-slate-800 dark:bg-slate-900 dark:hover:shadow-none">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-sm font-bold text-slate-500 dark:text-slate-400">{{ $card['label'] }}</p>
                            <p class="mt-3 text-4xl font-extrabold tracking-tight text-slate-950 dark:text-white">{{ $card['value'] }}</p>
                        </div>
                        <span class="flex h-11 w-11 items-center justify-center rounded-2xl border {{ $card['tone'] }}">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </span>
                    </div>
                </a>
            @endforeach
        </section>

        <section class="grid grid-cols-1 gap-6 xl:grid-cols-[1fr_380px]">
            <div class="rounded-3xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <div class="flex flex-col gap-3 border-b border-slate-100 p-5 dark:border-slate-800 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="text-lg font-extrabold text-slate-950 dark:text-white">Kegiatan Terbaru</h3>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Konten kegiatan yang baru dibuat atau diperbarui.</p>
                    </div>
                    <a href="{{ route('admin.posts.index') }}" class="text-sm font-extrabold text-emerald-700 hover:text-emerald-800 dark:text-emerald-300">Kelola</a>
                </div>
                <div class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($recentPosts as $post)
                        <div class="flex flex-col gap-3 p-5 sm:flex-row sm:items-center sm:justify-between">
                            <div class="min-w-0">
                                <h4 class="truncate text-sm font-extrabold text-slate-900 dark:text-white">{{ $post->title }}</h4>
                                <div class="mt-2 flex flex-wrap items-center gap-2">
                                    <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-bold text-emerald-700 dark:bg-emerald-950/50 dark:text-emerald-300">{{ $post->category }}</span>
                                    <span class="text-xs font-semibold text-slate-400">{{ $post->published_at ? $post->published_at->format('d M Y') : 'Draft' }}</span>
                                </div>
                            </div>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="inline-flex rounded-2xl border border-slate-200 px-3 py-2 text-xs font-bold text-slate-600 hover:border-emerald-200 hover:text-emerald-700 dark:border-slate-800 dark:text-slate-300">Edit</a>
                        </div>
                    @empty
                        <p class="p-8 text-center text-sm font-semibold text-slate-500">Belum ada kegiatan.</p>
                    @endforelse
                </div>
            </div>

            <div class="space-y-6">
                <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                    <h3 class="text-lg font-extrabold text-slate-950 dark:text-white">Aksi Cepat</h3>
                    <div class="mt-4 grid gap-3">
                        <a href="{{ route('admin.categories.index') }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-bold text-slate-700 transition hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700 dark:border-slate-800 dark:text-slate-200 dark:hover:bg-emerald-950/30">Kelola Kategori</a>
                        <a href="{{ route('admin.galleries.create') }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-bold text-slate-700 transition hover:border-amber-200 hover:bg-amber-50 hover:text-amber-700 dark:border-slate-800 dark:text-slate-200 dark:hover:bg-amber-950/30">Upload Foto Galeri</a>
                        <a href="{{ route('admin.settings.edit') }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-bold text-slate-700 transition hover:border-sky-200 hover:bg-sky-50 hover:text-sky-700 dark:border-slate-800 dark:text-slate-200 dark:hover:bg-sky-950/30">Pengaturan Website</a>
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
                    <div class="border-b border-slate-100 p-5 dark:border-slate-800">
                        <h3 class="text-lg font-extrabold text-slate-950 dark:text-white">Pengumuman Terbaru</h3>
                    </div>
                    <div class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse($recentAnnouncements as $announcement)
                            <div class="p-5">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="min-w-0">
                                        <h4 class="truncate text-sm font-extrabold text-slate-900 dark:text-white">{{ $announcement->title }}</h4>
                                        <p class="mt-1 line-clamp-2 text-xs leading-5 text-slate-500 dark:text-slate-400">{{ $announcement->description }}</p>
                                    </div>
                                    <a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="text-xs font-extrabold text-emerald-700 dark:text-emerald-300">Edit</a>
                                </div>
                            </div>
                        @empty
                            <p class="p-8 text-center text-sm font-semibold text-slate-500">Belum ada pengumuman.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>