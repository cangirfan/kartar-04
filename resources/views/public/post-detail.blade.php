@extends('layouts.public')

@section('content')
<div class="py-12 bg-slate-50 dark:bg-slate-950 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ url('/kegiatan') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-indigo-600 dark:text-slate-400 dark:hover:text-indigo-400 transition-colors duration-200 group">
                <svg class="h-4 w-4 transform transition-transform duration-200 group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Kembali ke Kegiatan
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Left: Content details -->
            <div class="lg:col-span-2 space-y-8 bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-10 border border-slate-100 dark:border-slate-800/80 shadow-sm">
                <!-- Header -->
                <div class="space-y-4">
                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold bg-indigo-600 text-white shadow-sm">
                        {{ $post->category }}
                    </span>
                    <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white leading-tight">
                        {{ $post->title }}
                    </h1>
                    <div class="flex items-center gap-2 text-sm text-slate-400 dark:text-slate-500">
                        <span>Diterbitkan pada:</span>
                        <span class="font-semibold text-slate-600 dark:text-slate-300">{{ $post->published_at ? $post->published_at->format('d F Y') : $post->created_at->format('d F Y') }}</span>
                    </div>
                </div>

                <!-- Thumbnail Banner -->
                <div class="rounded-2xl overflow-hidden aspect-video bg-slate-100 dark:bg-slate-800 shadow-sm">
                    @if(!empty($post->thumbnail))
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-indigo-100 to-emerald-50 dark:from-indigo-950 dark:to-slate-900 flex items-center justify-center text-slate-400 dark:text-slate-600">
                            <span class="text-6xl">📸</span>
                        </div>
                    @endif
                </div>

                <!-- Content text -->
                <div class="text-slate-700 dark:text-slate-300 space-y-6 leading-relaxed text-base">
                    <!-- Standard formatting support in case Markdown or HTML is passed -->
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>

            <!-- Right: Related posts -->
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-8 border border-slate-100 dark:border-slate-800 shadow-sm space-y-6">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-3">
                        Kegiatan Terkait
                    </h3>

                    <div class="space-y-6">
                        @forelse($relatedPosts as $relPost)
                            <a href="{{ url('/kegiatan/' . $relPost->slug) }}" class="flex gap-4 group">
                                <div class="w-20 h-20 rounded-xl overflow-hidden bg-slate-100 dark:bg-slate-800 flex-shrink-0">
                                    @if(!empty($relPost->thumbnail))
                                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $relPost->thumbnail) }}" alt="{{ $relPost->title }}">
                                    @else
                                        <div class="w-full h-full bg-indigo-50 dark:bg-indigo-950/30 flex items-center justify-center text-xs">
                                            📸
                                        </div>
                                    @endif
                                </div>
                                <div class="space-y-1">
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">{{ $relPost->category }}</span>
                                    <h4 class="font-bold text-slate-900 dark:text-white text-sm leading-snug line-clamp-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-200">
                                        {{ $relPost->title }}
                                    </h4>
                                    <p class="text-[11px] text-slate-400">{{ $relPost->published_at ? $relPost->published_at->format('d M Y') : $relPost->created_at->format('d M Y') }}</p>
                                </div>
                            </a>
                        @empty
                            <p class="text-sm text-slate-500">Tidak ada kegiatan terkait.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
