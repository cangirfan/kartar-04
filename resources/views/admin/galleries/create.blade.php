<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.galleries.index') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Unggah Foto Galeri Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-150 dark:border-gray-700 p-6 sm:p-10">
                
                <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Title -->
                    <div class="space-y-1">
                        <label for="title" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Judul Foto / Kegiatan</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('title') border-red-500 @enderror" 
                               placeholder="Masukkan judul deskriptif foto..." required>
                        @error('title')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="space-y-1">
                        <label for="category" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Kategori Kegiatan</label>
                        <select name="category" id="category" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('category') border-red-500 @enderror" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="space-y-1">
                        <label for="image" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Foto</label>
                        <input type="file" name="image" id="image" 
                               class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-450 focus:outline-none @error('image') border-red-500 @enderror" required>
                        <p class="text-xs text-gray-400">File berupa gambar (JPG, JPEG, PNG). Maksimal 3MB. Gambar akan dipotong menjadi bentuk persegi otomatis.</p>
                        @error('image')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end gap-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('admin.galleries.index') }}" class="px-6 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-900 border border-gray-250 dark:border-gray-700 text-center transition-colors">
                            Batal
                        </a>
                        <button type="submit" class="px-8 py-3 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-md shadow-indigo-600/10 transition-colors">
                            Unggah Foto
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
