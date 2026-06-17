<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.managements.index') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Pengurus') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-150 dark:border-gray-700 p-6 sm:p-10">
                
                <form action="{{ route('admin.managements.update', $management->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="space-y-1">
                        <label for="name" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $management->name) }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('name') border-red-500 @enderror" 
                               placeholder="Masukkan nama lengkap pengurus..." required>
                        @error('name')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Position -->
                    <div class="space-y-1">
                        <label for="position" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Jabatan</label>
                        <input type="text" name="position" id="position" value="{{ old('position', $management->position) }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('position') border-red-500 @enderror" 
                               placeholder="Contoh: Ketua, Sekretaris, Bidang Olahraga..." required>
                        @error('position')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="space-y-1">
                        <label for="description" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Deskripsi Singkat Peran</label>
                        <textarea name="description" id="description" rows="4" 
                                  class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('description') border-red-500 @enderror" 
                                  placeholder="Tulis deskripsi tugas atau perannya di organisasi..." >{{ old('description', $management->description) }}</textarea>
                        @error('description')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image (Avatar) -->
                    <div class="space-y-3">
                        <label for="image" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Foto Profil</label>
                        
                        @if(!empty($management->image))
                            <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-100 dark:bg-gray-900 border border-gray-200 dark:border-gray-700">
                                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $management->image) }}" alt="{{ $management->name }}">
                            </div>
                            <p class="text-xs text-gray-500">Foto saat ini. Upload foto baru jika ingin menggantinya.</p>
                        @endif

                        <input type="file" name="image" id="image" 
                               class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 focus:outline-none @error('image') border-red-500 @enderror">
                        <p class="text-xs text-gray-400">File berupa gambar (JPG, JPEG, PNG). Maksimal 2MB. Gambar akan dipotong menjadi bentuk persegi otomatis.</p>
                        @error('image')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end gap-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('admin.managements.index') }}" class="px-6 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-900 border border-gray-250 dark:border-gray-700 text-center transition-colors">
                            Batal
                        </a>
                        <button type="submit" class="px-8 py-3 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-md shadow-indigo-600/10 transition-colors">
                            Perbarui Pengurus
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
