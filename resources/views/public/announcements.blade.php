@extends('layouts.public')

@section('content')
<!-- Page Header -->
<div class="bg-slate-900 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-indigo-950 via-slate-900 to-slate-950"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="text-4xl font-extrabold tracking-tight">Pengumuman RT</h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-base">
            Informasi penting, surat edaran, rapat warga, dan jadwal kegiatan sosial di lingkungan RT.
        </p>
    </div>
</div>

<!-- Bulletin Board Section -->
<div class="py-12 bg-slate-50 dark:bg-slate-950 min-h-[50vh] transition-colors duration-300">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <div id="items-grid" class="space-y-6">
            @forelse($announcements as $announcement)
                <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-md hover:border-indigo-100 dark:hover:border-indigo-950 transition-all duration-300 group flex gap-6">
                    <!-- Icon Calendar Badge -->
                    <div class="hidden sm:flex flex-col items-center justify-center w-20 h-20 rounded-xl bg-slate-50 dark:bg-slate-950 border border-slate-100 dark:border-slate-800 flex-shrink-0 text-slate-500">
                        <span class="text-xs font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">{{ $announcement->published_at ? $announcement->published_at->format('M') : $announcement->created_at->format('M') }}</span>
                        <span class="text-3xl font-extrabold text-slate-800 dark:text-white">{{ $announcement->published_at ? $announcement->published_at->format('d') : $announcement->created_at->format('d') }}</span>
                    </div>

                    <!-- Announcement details -->
                    <div class="space-y-3 flex-grow">
                        <div class="flex items-center gap-3">
                            <span class="h-2.5 w-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-xs font-bold text-slate-400 dark:text-slate-500 sm:hidden">
                                {{ $announcement->published_at ? $announcement->published_at->format('d M Y') : $announcement->created_at->format('d M Y') }}
                            </span>
                            <span class="text-xs font-bold text-slate-400 dark:text-slate-500 hidden sm:inline">
                                {{ $announcement->published_at ? $announcement->published_at->format('Y') : $announcement->created_at->format('Y') }}
                            </span>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-200">
                            <a href="{{ url('/pengumuman/' . $announcement->slug) }}">
                                {{ $announcement->title }}
                            </a>
                        </h2>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed line-clamp-3">
                            {{ $announcement->description }}
                        </p>
                        <div class="pt-2">
                            <a href="{{ url('/pengumuman/' . $announcement->slug) }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors duration-200">
                                Selengkapnya
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-24 bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-slate-800 text-slate-500 dark:text-slate-400">
                    <span class="text-4xl block mb-3">📢</span>
                    Belum ada pengumuman untuk saat ini.
                </div>
            @endforelse
        </div>

        <!-- Infinite Scroll Loader -->
        <div id="infinite-scroll-trigger" class="flex items-center justify-center gap-3 py-8">
            <svg class="spinner-svg animate-spin h-6 w-6 text-indigo-600 hidden" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="spinner-text text-sm font-bold text-slate-400 dark:text-slate-500 hidden animate-pulse">Memuat pengumuman lainnya...</span>
        </div>

        <!-- Pagination -->
        <div id="pagination-links" class="hidden">
            {{ $announcements->links() }}
        </div>
    </div>
</div>
@endsection
