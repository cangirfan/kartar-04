@extends('layouts.public')

@section('content')
<!-- Page Header -->
<div class="bg-slate-900 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-indigo-950 via-slate-900 to-slate-950"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="text-4xl font-extrabold tracking-tight">Galeri Dokumentasi</h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-base">
            Kumpulan dokumentasi foto dan album kegiatan kemasyarakatan Karang Taruna.
        </p>
    </div>
</div>

<!-- Gallery Grid & Lightbox Section -->
<div class="py-12 bg-slate-50 dark:bg-slate-950 min-h-[60vh] transition-colors duration-300" 
     x-data="{ 
         lightboxOpen: false, 
         activeImg: '', 
         activeTitle: '', 
         activeCat: '',
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
         },
         openLightbox(img, title, cat) {
             this.activeImg = img;
             this.activeTitle = title;
             this.activeCat = cat;
             this.lightboxOpen = true;
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
                    <a href="{{ url('/galeri') }}"
                       class="inline-flex shrink-0 items-center rounded-xl px-4 py-2 text-sm font-semibold transition-all duration-200 {{ !request()->filled('category') ? 'bg-indigo-600 text-white shadow-sm shadow-indigo-600/10' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800' }}">
                        Semua
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ url('/galeri?category=' . urlencode($category)) }}"
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

        <!-- Photos Grid -->
        <div id="items-grid" class="grid grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($galleries as $gallery)
                <!-- Image Card -->
                <div class="relative group aspect-square rounded-2xl overflow-hidden bg-slate-100 dark:bg-slate-800 shadow-sm hover:shadow-md transition-all duration-300 cursor-pointer"
                     @click="openLightbox('{{ !empty($gallery->image) ? asset('storage/' . $gallery->image) : '' }}', '{{ $gallery->title }}', '{{ $gallery->category }}')">
                    
                    @if(!empty($gallery->image))
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-slate-200 to-slate-100 dark:from-slate-800 dark:to-slate-900 flex flex-col items-center justify-center text-slate-400 dark:text-slate-600 p-4">
                            <span class="text-5xl mb-2">📸</span>
                            <span class="text-xs font-bold text-center leading-tight">{{ $gallery->title }}</span>
                        </div>
                    @endif

                    <!-- Cover Overlay -->
                    <div class="absolute inset-0 bg-slate-950/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <span class="text-xs text-indigo-400 font-bold uppercase tracking-wider mb-1">{{ $gallery->category }}</span>
                        <h4 class="text-white font-bold text-sm sm:text-base leading-tight">{{ $gallery->title }}</h4>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-24 bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-slate-800 text-slate-500 dark:text-slate-400">
                    <span class="text-4xl block mb-3">🖼️</span>
                    Belum ada dokumentasi di galeri.
                </div>
            @endforelse
        </div>
        
        <!-- Infinite Scroll Loader -->
        <div id="infinite-scroll-trigger" class="flex items-center justify-center gap-3 py-8">
            <svg class="spinner-svg animate-spin h-6 w-6 text-indigo-600 hidden" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="spinner-text text-sm font-bold text-slate-400 dark:text-slate-500 hidden animate-pulse">Memuat foto lainnya...</span>
        </div>

        <!-- Pagination -->
        <div id="pagination-links" class="hidden">
            {{ $galleries->withQueryString()->links() }}
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/90" 
         x-show="lightboxOpen" 
         style="display: none;"
         x-transition
         @keydown.escape.window="lightboxOpen = false">
         
        <!-- Close Button -->
        <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white hover:text-indigo-400 transition-colors duration-200 focus:outline-none">
            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Lightbox Content Card -->
        <div class="max-w-4xl w-full flex flex-col max-h-[85vh] bg-slate-900/60 rounded-3xl overflow-hidden border border-slate-800 shadow-2xl relative" @click.away="lightboxOpen = false">
            <div class="flex-grow overflow-hidden flex items-center justify-center p-4 bg-slate-950/30">
                <template x-if="activeImg !== ''">
                    <img :src="activeImg" :alt="activeTitle" class="max-w-full max-h-[60vh] object-contain rounded-xl">
                </template>
                <template x-if="activeImg === ''">
                    <div class="flex flex-col items-center justify-center text-slate-500 py-16">
                        <span class="text-8xl mb-4">📸</span>
                        <span class="text-lg font-semibold">Dokumentasi Tanpa Foto Fisik</span>
                    </div>
                </template>
            </div>
            <div class="p-6 bg-slate-900 border-t border-slate-800 space-y-1">
                <span class="text-xs text-indigo-400 font-bold uppercase tracking-wider" x-text="activeCat"></span>
                <h3 class="text-white font-extrabold text-lg sm:text-xl leading-tight" x-text="activeTitle"></h3>
            </div>
        </div>
    </div>
    
</div>
@endsection



