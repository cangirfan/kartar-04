<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kelola Kategori') }}
            </h2>
            <a href="{{ route('admin.categories.create') }}" class="px-5 py-2.5 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm transition-colors duration-200 inline-block text-center">
                + Tambah Kategori
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

            @if(session('error'))
                <div class="mb-6 p-4 rounded-xl bg-rose-50 dark:bg-rose-950/30 text-rose-800 dark:text-rose-300 text-sm font-medium border border-rose-100 dark:border-rose-900">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-150 dark:border-gray-700">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-900 border-b border-gray-100 dark:border-gray-700">
                                <th class="p-6 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Nama Kategori</th>
                                <th class="p-6 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Urutan</th>
                                <th class="p-6 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Status</th>
                                <th class="p-6 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-sm">
                            @forelse($categories as $category)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-900/30 transition-colors duration-150">
                                    <td class="p-6 font-semibold text-gray-900 dark:text-white">
                                        {{ $category->name }}
                                    </td>
                                    <td class="p-6 text-gray-500 dark:text-gray-400">
                                        {{ $category->sort_order }}
                                    </td>
                                    <td class="p-6">
                                        @if($category->is_active)
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 dark:bg-emerald-950/50 text-emerald-700 dark:text-emerald-400 border border-emerald-100/50 dark:border-emerald-900/50">
                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                Aktif
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-gray-50 dark:bg-gray-900/50 text-gray-600 dark:text-gray-400 border border-gray-100 dark:border-gray-800">
                                                <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                                                Nonaktif
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-6 text-right">
                                        <div class="flex items-center justify-end gap-3">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm font-bold text-rose-600 hover:text-rose-800 dark:text-rose-400 dark:hover:text-rose-300">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-12 text-center text-gray-500 dark:text-gray-400">
                                        Belum ada kategori yang dibuat.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($categories->hasPages())
                    <div class="p-6 border-t border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/20">
                        {{ $categories->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
