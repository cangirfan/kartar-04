<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.umkms.index') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftarkan UMKM Warga Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-150 dark:border-gray-700 p-6 sm:p-10">
                
                <form action="{{ route('admin.umkms.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div class="space-y-1">
                        <label for="name" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Nama Usaha / Toko</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('name') border-red-500 @enderror" 
                               placeholder="Contoh: Warung Berkah, Laundry Bersih..." required>
                        @error('name')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Owner Name -->
                        <div class="space-y-1">
                            <label for="owner_name" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Nama Pemilik</label>
                            <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name') }}" 
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('owner_name') border-red-500 @enderror" 
                                   placeholder="Masukkan nama pemilik..." required>
                            @error('owner_name')
                                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- WhatsApp -->
                        <div class="space-y-1">
                            <label for="whatsapp" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Nomor WhatsApp</label>
                            <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp') }}" 
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('whatsapp') border-red-500 @enderror" 
                                   placeholder="Contoh: 08123456789..." required>
                            @error('whatsapp')
                                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-1">
                        <label for="description" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Deskripsi Usaha / Produk</label>
                        <textarea name="description" id="description" rows="4" 
                                  class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('description') border-red-500 @enderror" 
                                  placeholder="Deskripsikan produk yang dijual atau layanan yang ditawarkan..." required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div class="space-y-1">
                        <label for="location" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Alamat / Lokasi Fisik</label>
                        <input type="text" name="location" id="location" value="{{ old('location') }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('location') border-red-500 @enderror" 
                               placeholder="Contoh: RT 03 / RW 05, Samping Masjid Al-Hidayah...">
                        @error('location')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="space-y-1">
                        <label for="image" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Foto Tempat Usaha / Produk</label>
                        <input type="file" name="image" id="image" 
                               class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 focus:outline-none @error('image') border-red-500 @enderror">
                        <p class="text-xs text-gray-400">File berupa gambar (JPG, JPEG, PNG). Maksimal 2MB. Dimensi foto akan disesuaikan menjadi 3:2 otomatis.</p>
                        @error('image')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Publish -->
                    <div class="flex items-center gap-3 bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-800">
                        <input type="checkbox" name="status" id="status" value="1" {{ old('status', true) ? 'checked' : '' }}
                               class="h-5 w-5 rounded text-indigo-600 focus:ring-indigo-600 dark:bg-gray-800 border-gray-300 dark:border-gray-700">
                        <label for="status" class="text-sm font-bold text-gray-700 dark:text-gray-300 cursor-pointer">
                            Aktifkan UMKM ini di halaman publik
                        </label>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end gap-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('admin.umkms.index') }}" class="px-6 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-900 border border-gray-250 dark:border-gray-700 text-center transition-colors">
                            Batal
                        </a>
                        <button type="submit" class="px-8 py-3 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-md shadow-indigo-600/10 transition-colors">
                            Simpan UMKM
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
