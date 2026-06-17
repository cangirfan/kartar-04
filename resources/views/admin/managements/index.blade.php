<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kelola Pengurus Karang Taruna') }}
            </h2>
            <a href="{{ route('admin.managements.create') }}" class="px-5 py-2.5 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm transition-colors duration-200 inline-block text-center">
                + Tambah Pengurus
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

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-150 dark:border-gray-700">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-900 border-b border-gray-100 dark:border-gray-700">
                                <th class="p-6 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Foto</th>
                                <th class="p-6 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Nama</th>
                                <th class="p-6 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Jabatan</th>
                                <th class="p-6 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Deskripsi Peran</th>
                                <th class="p-6 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-sm">
                            @forelse($managements as $member)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-900/30 transition-colors duration-150">
                                    <!-- Avatar -->
                                    <td class="p-6">
                                        <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 dark:bg-gray-900 flex items-center justify-center border border-gray-200 dark:border-gray-700">
                                            @if(!empty($member->image))
                                                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                                            @else
                                                <span class="text-xl">👤</span>
                                            @endif
                                        </div>
                                    </td>
                                    <!-- Name -->
                                    <td class="p-6 font-semibold text-gray-900 dark:text-white">
                                        {{ $member->name }}
                                    </td>
                                    <!-- Position -->
                                    <td class="p-6 text-indigo-600 dark:text-indigo-400 font-bold uppercase tracking-wider text-xs">
                                        {{ $member->position }}
                                    </td>
                                    <!-- Description -->
                                    <td class="p-6 text-gray-500 dark:text-gray-400 max-w-xs truncate">
                                        {{ $member->description ?? '-' }}
                                    </td>
                                    <!-- Actions -->
                                    <td class="p-6 text-right">
                                        <div class="flex items-center justify-end gap-3">
                                            <a href="{{ route('admin.managements.edit', $member->id) }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300">
                                                Edit
                                            </a>
                                            
                                            <!-- Delete Form -->
                                            <form action="{{ route('admin.managements.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pengurus ini?');">
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
                                    <td colspan="5" class="p-12 text-center text-gray-500 dark:text-gray-400">
                                        Belum ada pengurus yang ditambahkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
