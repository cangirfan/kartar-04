<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.announcements.index') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Pengumuman') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-150 dark:border-gray-700 p-6 sm:p-10">
                
                <form action="{{ route('admin.announcements.update', $announcement->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="space-y-1">
                        <label for="title" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Judul Pengumuman</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $announcement->title) }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('title') border-red-500 @enderror" 
                               placeholder="Masukkan judul pengumuman..." required>
                        @error('title')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Published At -->
                    <div class="space-y-1">
                        <label for="published_at" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Tanggal Publikasi</label>
                        <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at', $announcement->published_at ? $announcement->published_at->format('Y-m-d\TH:i') : '') }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('published_at') border-red-500 @enderror">
                        @error('published_at')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="space-y-1">
                        <label for="description" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Isi Pengumuman</label>
                        <textarea name="description" id="description" rows="8" 
                                  class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('description') border-red-500 @enderror" 
                                  placeholder="Tulis deskripsi detail pengumuman disini..." required>{{ old('description', $announcement->description) }}</textarea>
                        @error('description')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Publish -->
                    <div class="flex items-center gap-3 bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-800">
                        <input type="checkbox" name="status" id="status" value="1" {{ old('status', $announcement->status) ? 'checked' : '' }}
                               class="h-5 w-5 rounded text-indigo-600 focus:ring-indigo-600 dark:bg-gray-800 border-gray-300 dark:border-gray-700">
                        <label for="status" class="text-sm font-bold text-gray-700 dark:text-gray-300 cursor-pointer">
                            Publikasikan langsung (Aktif)
                        </label>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end gap-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('admin.announcements.index') }}" class="px-6 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-900 border border-gray-250 dark:border-gray-700 text-center transition-colors">
                            Batal
                        </a>
                        <button type="submit" class="px-8 py-3 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-md shadow-indigo-600/10 transition-colors">
                            Perbarui Pengumuman
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
