@extends('layouts.public')

@section('content')
<!-- Page Header -->
<div class="bg-slate-900 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-indigo-950 via-slate-900 to-slate-950"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="text-4xl font-extrabold tracking-tight">Kegiatan Karang Taruna</h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-base">
            Ikuti berbagai aktivitas, agenda, dan program sosial kemasyarakatan dari pemuda Karang Taruna.
        </p>
    </div>
</div>

<!-- Filters & List Section -->
<div class="py-12 bg-slate-50 dark:bg-slate-950 min-h-[50vh] transition-colors duration-300"
     x-data="{
         categoriesOverflow: false,
         checkCategoryOverflow() {
             const slider = this.$refs.categorySlider;
             if (!slider) return;
             this.categoriesOverflow = slider.scrollWidth > slider.clientWidth + 8;
         },
         scrollCategories(direction) {
             const slider = this.$refs.categorySlider;
             if (!slider) return;
             slider.scrollBy({ left: direction * Math.max(220, slider.clientWidth * 0.65), behavior: 'smooth' });
         }
     }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <!-- Category Filters -->
        <div x-init="$nextTick(() => { checkCategoryOverflow(); window.addEventListener('resize', () => checkCategoryOverflow()) })"
             class="mx-auto flex max-w-full items-center gap-3 rounded-2xl border border-slate-100 bg-white p-3 shadow-sm transition-all duration-300 dark:border-slate-800 dark:bg-slate-900 sm:p-4"
             :class="categoriesOverflow ? 'w-full' : 'w-fit'">
            <span class="hidden shrink-0 text-sm font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 sm:block">Kategori:</span>

            <button type="button"
                    x-show="categoriesOverflow"
                    x-transition.opacity
                    @click="scrollCategories(-1)"
                    class="h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-slate-200 text-slate-500 transition-colors duration-200 hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600 dark:border-slate-800 dark:text-slate-400 dark:hover:border-slate-700 dark:hover:bg-slate-800 dark:hover:text-white"
                    :class="categoriesOverflow ? 'hidden sm:inline-flex' : 'hidden'"
                    aria-label="Geser kategori ke kiri">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </button>

            <div class="relative min-w-0" :class="categoriesOverflow ? 'flex-1' : 'flex-none'">
                <div x-ref="categorySlider"
                     class="flex gap-3 overflow-x-auto scroll-smooth whitespace-nowrap px-1 py-1 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden"
                     :class="categoriesOverflow ? '' : 'justify-center'">
                    <a href="{{ url('/kegiatan') }}"
                       class="inline-flex shrink-0 items-center rounded-xl px-4 py-2 text-sm font-semibold transition-all duration-200 {{ !request()->filled('category') ? 'bg-indigo-600 text-white shadow-sm shadow-indigo-600/10' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                        Semua
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ url('/kegiatan?category=' . urlencode($category)) }}"
                           class="inline-flex shrink-0 items-center rounded-xl px-4 py-2 text-sm font-semibold transition-all duration-200 {{ request()->query('category') === $category ? 'bg-indigo-600 text-white shadow-sm shadow-indigo-600/10' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                            {{ $category }}
                        </a>
                    @endforeach
                </div>
            </div>

            <button type="button"
                    x-show="categoriesOverflow"
                    x-transition.opacity
                    @click="scrollCategories(1)"
                    class="h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-slate-200 text-slate-500 transition-colors duration-200 hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600 dark:border-slate-800 dark:text-slate-400 dark:hover:border-slate-700 dark:hover:bg-slate-800 dark:hover:text-white"
                    :class="categoriesOverflow ? 'hidden sm:inline-flex' : 'hidden'"
                    aria-label="Geser kategori ke kanan">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>

        <!-- Cards Grid -->
        <div id="items-grid" class="grid grid-cols-1 md:grid-cols-3 gap-8">
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
                <div class="col-span-3 text-center py-24 bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-slate-800 text-slate-500 dark:text-slate-400">
                    <span class="text-4xl block mb-3">📂</span>
                    Tidak ada kegiatan ditemukan dalam kategori ini.
                </div>
            @endforelse
        </div>

        <!-- Infinite Scroll Loader -->
        <div id="infinite-scroll-trigger" class="flex items-center justify-center gap-3 py-8">
            <svg class="spinner-svg animate-spin h-6 w-6 text-indigo-600 hidden" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="spinner-text text-sm font-bold text-slate-400 dark:text-slate-500 hidden animate-pulse">Memuat kegiatan lainnya...</span>
        </div>

        <!-- Pagination -->
        <div id="pagination-links" class="hidden">
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection

