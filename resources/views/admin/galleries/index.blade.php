<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kelola Galeri Dokumentasi') }}
            </h2>
            <a href="{{ route('admin.galleries.create') }}" class="px-5 py-2.5 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm transition-colors duration-200 inline-block text-center">
                + Tambah Foto
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-50 dark:bg-emerald-950/30 text-emerald-800 dark:text-emerald-300 text-sm font-medium border border-emerald-100 dark:border-emerald-900">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Grid Layout for Gallery -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($galleries as $gallery)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-150 dark:border-gray-700 shadow-sm flex flex-col group hover:shadow-md transition-shadow">
                        <!-- Image Container -->
                        <div class="relative aspect-square bg-gray-100 dark:bg-gray-900 overflow-hidden">
                            @if(!empty($gallery->image))
                                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-4xl bg-gray-100 dark:bg-gray-900">
                                    📸
                                </div>
                            @endif
                            <span class="absolute top-3 left-3 inline-flex px-2 py-0.5 rounded-full text-[10px] font-bold bg-indigo-600 text-white shadow-sm">
                                {{ $gallery->category }}
                            </span>
                        </div>

                        <!-- Info Area -->
                        <div class="p-4 flex-grow flex flex-col justify-between gap-3">
                            <h4 class="font-bold text-sm text-gray-900 dark:text-white line-clamp-2 leading-snug">
                                {{ $gallery->title }}
                            </h4>

                            <!-- Actions -->
                            <div class="flex items-center justify-between border-t border-gray-50 dark:border-gray-700 pt-3 text-xs">
                                <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="font-bold text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300">
                                    Edit
                                </a>

                                <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-bold text-rose-600 hover:text-rose-800 dark:text-rose-400 dark:hover:text-rose-300">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-24 bg-white dark:bg-gray-800 rounded-2xl border border-gray-150 dark:border-gray-700 text-gray-500">
                        <span class="text-4xl block mb-3">📸</span>
                        Belum ada foto galeri yang diunggah.
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($galleries->hasPages())
                <div class="mt-8">
                    {{ $galleries->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
