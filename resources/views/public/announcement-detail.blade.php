@extends('layouts.public')

@section('content')
<div class="py-12 bg-slate-50 dark:bg-slate-950 min-h-[60vh] transition-colors duration-300">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ url('/pengumuman') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-indigo-600 dark:text-slate-400 dark:hover:text-indigo-400 transition-colors duration-200 group">
                <svg class="h-4 w-4 transform transition-transform duration-200 group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Kembali ke Pengumuman
            </a>
        </div>

        <!-- Announcement Details Card -->
        <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 sm:p-12 border border-slate-100 dark:border-slate-800 shadow-sm space-y-6">
            <div class="flex items-center gap-2 text-sm text-slate-400 dark:text-slate-500">
                <span class="inline-flex h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                <span>Diumumkan pada:</span>
                <span class="font-semibold text-slate-700 dark:text-slate-300">{{ $announcement->published_at ? $announcement->published_at->format('d F Y') : $announcement->created_at->format('d F Y') }}</span>
            </div>

            <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white leading-tight">
                {{ $announcement->title }}
            </h1>

            <hr class="border-slate-100 dark:border-slate-800">

            <!-- Announcement Content -->
            <div class="text-slate-700 dark:text-slate-300 space-y-6 leading-relaxed text-lg whitespace-pre-wrap font-light">
                {{ $announcement->description }}
            </div>
        </div>

    </div>
</div>
@endsection
