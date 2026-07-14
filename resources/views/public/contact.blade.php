@extends('layouts.public')

@section('content')
<!-- Page Header -->
<div class="bg-slate-900 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-indigo-950 via-slate-900 to-slate-950"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="text-4xl font-extrabold tracking-tight">Hubungi Kami</h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-base">
            Ada pertanyaan, kerja sama, atau butuh bantuan administrasi? Silakan hubungi pengurus kami.
        </p>
    </div>
</div>

<div class="py-16 bg-slate-50 dark:bg-slate-950 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Left Info Block -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Secretariat Info -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-10 border border-slate-100 dark:border-slate-800 shadow-sm space-y-8">
                    <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white">Informasi Sekretariat</h2>
                    
                    <div class="space-y-6">
                        <!-- Address Info -->
                        <div class="flex items-start gap-4">
                            <span class="text-3xl">🏢</span>
                            <div class="space-y-1">
                                <h3 class="font-bold text-slate-900 dark:text-white text-base">Alamat Kantor</h3>
                                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">
                                    {{ $gSettings->address ?? 'Sekretariat Karang Taruna RT 05, Kelurahan Harapan.' }}
                                </p>
                            </div>
                        </div>

                        <!-- WhatsApp Info -->
                        @if(!empty($gSettings->whatsapp))
                            <div class="flex items-start gap-4">
                                <span class="text-3xl">💬</span>
                                <div class="space-y-1">
                                    <h3 class="font-bold text-slate-900 dark:text-white text-base">WhatsApp Admin</h3>
                                    <a href="https://wa.me/{{ $gSettings->whatsapp }}" target="_blank" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 font-semibold text-sm transition-colors duration-200 block">
                                        +{{ $gSettings->whatsapp }}
                                    </a>
                                    <p class="text-xs text-slate-400">Respons cepat pada hari kerja.</p>
                                </div>
                            </div>
                        @endif

                        <!-- Email Info -->
                        @if(!empty($gSettings->email))
                            <div class="flex items-start gap-4">
                                <span class="text-3xl">✉️</span>
                                <div class="space-y-1">
                                    <h3 class="font-bold text-slate-900 dark:text-white text-base">Alamat Email</h3>
                                    <a href="mailto:{{ $gSettings->email }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 font-semibold text-sm transition-colors duration-200 block">
                                        {{ $gSettings->email }}
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Donation Card -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-10 border border-slate-100 dark:border-slate-800 shadow-sm space-y-6">
                    <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white flex items-center gap-2">
                        <span class="text-rose-500">❤️</span> Donasi Peduli
                    </h2>
                    <p class="text-xs text-slate-550 dark:text-slate-400 leading-relaxed">
                        Anda juga dapat mendukung program kerja Karang Taruna RT 05 melalui donasi QRIS di bawah ini:
                    </p>
                    <div class="p-4 bg-slate-50 dark:bg-slate-950 border border-slate-100 dark:border-slate-800 rounded-2xl flex flex-col items-center justify-center space-y-3 shadow-inner">
                        @if(!empty($gSettings->donation_qr))
                            <img class="w-full aspect-square max-w-[200px] object-contain rounded-xl shadow-md border border-white dark:border-slate-850" src="{{ asset('storage/' . $gSettings->donation_qr) }}" alt="QRIS Donasi">
                        @else
                            <div class="w-48 h-48 bg-slate-200 dark:bg-slate-800 rounded-xl flex items-center justify-center text-slate-400 text-xs font-semibold">
                                Belum Ada Barcode Donasi
                            </div>
                        @endif
                        <span class="text-[10px] font-bold text-slate-400 dark:text-slate-500 tracking-wider uppercase text-center">SCAN QRIS UNTUK DONASI</span>
                    </div>
                </div>
            </div>

            <!-- Right Map & Embed Block -->
            <div class="lg:col-span-2 space-y-6 bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-10 border border-slate-100 dark:border-slate-800 shadow-sm">
                <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white">Peta Lokasi</h2>
                @php
                    $hasCoordinates = filled($gSettings->latitude ?? null) && filled($gSettings->longitude ?? null);
                    $mapQuery = $hasCoordinates
                        ? ('loc:' . $gSettings->latitude . ',' . $gSettings->longitude)
                        : ($gSettings->address ?? 'Jakarta');
                @endphp
                <div class="rounded-2xl overflow-hidden aspect-video border border-slate-150 dark:border-slate-800 shadow-inner relative">
                    <!-- OSM Dynamic Map Frame -->
                    <iframe 
                        width="100%" 
                        height="100%" 
                        frameborder="0" 
                        scrolling="no" 
                        marginheight="0" 
                        marginwidth="0" 
                        src="https://maps.google.com/maps?q={{ urlencode($mapQuery) }}&t=&z=17&ie=UTF8&output=embed"
                        class="absolute inset-0 w-full h-full grayscale dark:invert dark:opacity-85"
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection


