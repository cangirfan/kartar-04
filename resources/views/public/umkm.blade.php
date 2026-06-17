@extends('layouts.public')

@section('content')
<!-- Page Header -->
<div class="bg-slate-900 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-indigo-950 via-slate-900 to-slate-950"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="text-4xl font-extrabold tracking-tight">UMKM Warga</h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-base">
            Mendukung perekonomian lokal dengan mengenalkan berbagai produk dan usaha milik warga RT.
        </p>
    </div>
</div>

<!-- Business Listing Grid -->
<div class="py-12 bg-slate-50 dark:bg-slate-950 min-h-[50vh] transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <div id="items-grid" class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($umkms as $umkm)
                <div class="bg-white dark:bg-slate-900 rounded-3xl overflow-hidden border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col h-full">
                    <!-- Shop Image -->
                    <div class="relative aspect-video bg-slate-100 dark:bg-slate-800 overflow-hidden flex-shrink-0">
                        @if(!empty($umkm->image))
                            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $umkm->image) }}" alt="{{ $umkm->name }}">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-indigo-50 to-emerald-50 dark:from-indigo-950/20 dark:to-slate-900 flex items-center justify-center text-5xl">
                                🏪
                            </div>
                        @endif
                    </div>

                    <!-- Shop Body -->
                    <div class="p-6 flex flex-col flex-grow space-y-4">
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/30 px-2.5 py-1 rounded-full">
                                Pemilik: {{ $umkm->owner_name }}
                            </span>
                            <h3 class="text-xl font-extrabold text-slate-900 dark:text-white pt-2">
                                {{ $umkm->name }}
                            </h3>
                        </div>

                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed flex-grow">
                            {{ $umkm->description }}
                        </p>

                        <!-- Address Info -->
                        @if(!empty($umkm->location))
                            <div class="flex items-start gap-2 text-xs text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-950 p-3 rounded-xl border border-slate-100 dark:border-slate-800/80">
                                <span class="text-base">📍</span>
                                <span class="leading-relaxed">
                                    <strong>Lokasi:</strong> {{ $umkm->location }}
                                </span>
                            </div>
                        @endif

                        <!-- WhatsApp Action Link -->
                        <div class="pt-2">
                            <a href="https://wa.me/{{ $umkm->whatsapp }}?text=Halo%20Mba/Mas%20{{ urlencode($umkm->owner_name) }},%20saya%20tertarik%20dengan%20produk%20dari%20usaha%20{{ urlencode($umkm->name) }}%20Anda."
                               target="_blank"
                               class="w-full py-3 px-4 rounded-xl text-sm font-bold text-center bg-emerald-600 hover:bg-emerald-700 text-white shadow-md shadow-emerald-600/10 flex items-center justify-center gap-2 transition-colors duration-200">
                                <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.746.953 3.71 1.458 5.704 1.459h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                Hubungi Penjual (WhatsApp)
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-24 bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-slate-800 text-slate-500 dark:text-slate-400">
                    <span class="text-4xl block mb-3">🛍️</span>
                    Belum ada pelaku UMKM warga yang terdaftar.
                </div>
            @endforelse
        </div>
        
        <!-- Infinite Scroll Loader -->
        <div id="infinite-scroll-trigger" class="flex items-center justify-center gap-3 py-8">
            <svg class="spinner-svg animate-spin h-6 w-6 text-indigo-600 hidden" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="spinner-text text-sm font-bold text-slate-400 dark:text-slate-500 hidden animate-pulse">Memuat toko lainnya...</span>
        </div>

        <!-- Pagination -->
        <div id="pagination-links" class="hidden">
            {{ $umkms->links() }}
        </div>
    </div>
</div>
@endsection
