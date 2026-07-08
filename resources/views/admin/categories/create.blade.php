<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.categories.index') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tambah Kategori') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-150 dark:border-gray-700 p-6 sm:p-10">
                <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="space-y-1">
                        <label for="name" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Nama Kategori</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('name') border-red-500 @enderror"
                               placeholder="Contoh: Kerja Bakti" required>
                        @error('name')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-1">
                        <label for="sort_order" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Urutan</label>
                        <input type="number" min="0" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 @error('sort_order') border-red-500 @enderror">
                        @error('sort_order')
                            <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-3 bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-800">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                               class="h-5 w-5 rounded text-indigo-600 focus:ring-indigo-600 dark:bg-gray-800 border-gray-300 dark:border-gray-700">
                        <label for="is_active" class="text-sm font-bold text-gray-700 dark:text-gray-300 cursor-pointer">
                            Aktif
                        </label>
                    </div>

                    <div class="flex justify-end gap-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 rounded-xl text-sm font-bold text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-900 border border-gray-250 dark:border-gray-700 text-center transition-colors">
                            Batal
                        </a>
                        <button type="submit" class="px-8 py-3 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-md shadow-indigo-600/10 transition-colors">
                            Simpan Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
