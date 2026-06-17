@extends('layouts.public')

@section('content')
<!-- Page Header -->
<div class="bg-slate-900 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-indigo-950 via-slate-900 to-slate-950"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="text-4xl font-extrabold tracking-tight">Tentang Kami</h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-base">
            Mengenal lebih dekat sejarah, visi, misi, dan susunan kepengurusan Karang Taruna RT.
        </p>
    </div>
</div>

<!-- Sejarah Section -->
<div class="py-20 bg-white dark:bg-slate-900 transition-colors duration-300">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-6">
            <span class="text-xs font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">Sejarah Singkat</span>
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                Perjalanan Karang Taruna RT
            </h2>
            <div class="prose prose-slate dark:prose-invert max-w-none text-slate-600 dark:text-slate-300 leading-relaxed space-y-4 text-base">
                <p>
                    Karang Taruna RT didirikan sebagai wadah pengembangan generasi muda yang tumbuh atas dasar kesadaran dan tanggung jawab sosial dari, oleh, dan untuk masyarakat, khususnya generasi muda di wilayah RT.
                </p>
                <p>
                    Sejak awal berdirinya, organisasi ini aktif bergerak dalam bidang sosial kemasyarakatan, olahraga, keagamaan, dan pemberdayaan ekonomi. Kami berkomitmen membentuk pemuda-pemudi yang berkarakter, berjiwa kepemimpinan tinggi, kepedulian sosial yang kuat, serta mampu beradaptasi menghadapi perkembangan zaman.
                </p>
                <p>
                    Melalui sinergi antar pengurus RT, tokoh masyarakat, dan warga sekitar, Karang Taruna terus berinovasi melaksanakan berbagai program yang membawa dampak positif nyata demi kemakmuran lingkungan bersama.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Visi & Misi Section -->
<div class="py-20 bg-slate-50 dark:bg-slate-950 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Vision -->
            <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 sm:p-10 border border-slate-100 dark:border-slate-800 shadow-sm space-y-6">
                <div class="h-12 w-12 rounded-xl bg-indigo-50 dark:bg-indigo-950/50 flex items-center justify-center text-2xl">
                    🌟
                </div>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Visi Kami</h3>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-base">
                    Menjadi organisasi kepemudaan yang mandiri, berkarakter, berdaya saing, dan berjiwa sosial tinggi dalam rangka mewujudkan lingkungan RT yang harmonis, kreatif, dan maju.
                </p>
            </div>
            
            <!-- Mission -->
            <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 sm:p-10 border border-slate-100 dark:border-slate-800 shadow-sm space-y-6">
                <div class="h-12 w-12 rounded-xl bg-emerald-50 dark:bg-emerald-950/50 flex items-center justify-center text-2xl">
                    🎯
                </div>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Misi Kami</h3>
                <ul class="space-y-4 text-slate-600 dark:text-slate-300 text-base">
                    <li class="flex gap-3">
                        <span class="text-indigo-600 dark:text-indigo-400 font-bold">1.</span>
                        <span>Membangun karakter pemuda yang religius, berintegritas, dan menjunjung tinggi gotong royong.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-indigo-600 dark:text-indigo-400 font-bold">2.</span>
                        <span>Menyelenggarakan kegiatan olahraga, seni, dan keagamaan guna mempererat kebersamaan warga.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-indigo-600 dark:text-indigo-400 font-bold">3.</span>
                        <span>Aktif berperan dalam kegiatan sosial kemanusiaan dan pelayanan bakti lingkungan.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-indigo-600 dark:text-indigo-400 font-bold">4.</span>
                        <span>Mendorong kemandirian ekonomi pemuda melalui pembinaan dan pemberdayaan pelaku UMKM warga.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Struktur Organisasi -->
<div class="py-20 bg-white dark:bg-slate-900 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-4 mb-16">
            <span class="text-xs font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">Pengurus</span>
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                Struktur Kepengurusan
            </h2>
            <p class="text-slate-500 dark:text-slate-400 max-w-xl mx-auto">
                Para pemuda-pemudi berdedikasi tinggi yang menggerakkan organisasi Karang Taruna di tingkat RT.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($managements as $member)
                <div class="bg-slate-50 dark:bg-slate-950 rounded-2xl p-6 border border-slate-100 dark:border-slate-800/80 shadow-sm flex flex-col items-center text-center space-y-4 hover:shadow-md transition-shadow duration-300">
                    <div class="h-28 w-28 rounded-full overflow-hidden border-2 border-indigo-600/20 bg-slate-100 dark:bg-slate-900 flex items-center justify-center">
                        @if(!empty($member->image))
                            <img class="h-full w-full object-cover" src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                        @else
                            <span class="text-4xl">👤</span>
                        @endif
                    </div>
                    <div class="space-y-1">
                        <h3 class="font-bold text-slate-900 dark:text-white text-lg leading-tight">{{ $member->name }}</h3>
                        <p class="text-sm text-indigo-600 dark:text-indigo-400 font-semibold uppercase tracking-wider">{{ $member->position }}</p>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed max-w-xs">
                        {{ $member->description }}
                    </p>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-500">
                    Belum ada data pengurus yang ditambahkan.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
