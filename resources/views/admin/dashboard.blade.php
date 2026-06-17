<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Statistics Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Posts count -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-6 flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-sm text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider">Total Kegiatan</span>
                        <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white">{{ $stats['posts_count'] }}</h3>
                    </div>
                    <div class="h-12 w-12 rounded-xl bg-indigo-50 dark:bg-indigo-950 flex items-center justify-center text-2xl text-indigo-600 dark:text-indigo-400">
                        📅
                    </div>
                </div>

                <!-- Announcements count -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-6 flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-sm text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider">Total Pengumuman</span>
                        <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white">{{ $stats['announcements_count'] }}</h3>
                    </div>
                    <div class="h-12 w-12 rounded-xl bg-emerald-50 dark:bg-emerald-950 flex items-center justify-center text-2xl text-emerald-600 dark:text-emerald-400">
                        📢
                    </div>
                </div>

                <!-- Galleries count -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-6 flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-sm text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider">Total Foto Galeri</span>
                        <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white">{{ $stats['galleries_count'] }}</h3>
                    </div>
                    <div class="h-12 w-12 rounded-xl bg-amber-50 dark:bg-amber-950 flex items-center justify-center text-2xl text-amber-600 dark:text-amber-400">
                        📸
                    </div>
                </div>

                <!-- UMKMs count -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-6 flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-sm text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider">UMKM Terdaftar</span>
                        <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white">{{ $stats['umkms_count'] }}</h3>
                    </div>
                    <div class="h-12 w-12 rounded-xl bg-rose-50 dark:bg-rose-950 flex items-center justify-center text-2xl text-rose-600 dark:text-rose-400">
                        🏪
                    </div>
                </div>
            </div>

            <!-- Content Overview Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Activities -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-6 space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-700 pb-3">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Kegiatan Terbaru</h3>
                        <a href="{{ route('admin.posts.index') }}" class="text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">Kelola</a>
                    </div>
                    <div class="space-y-3">
                        @forelse($recentPosts as $post)
                            <div class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-900/50 transition-colors duration-200">
                                <div class="space-y-1">
                                    <h4 class="font-bold text-sm text-gray-800 dark:text-gray-200">{{ $post->title }}</h4>
                                    <span class="text-xs text-indigo-600 bg-indigo-50 dark:bg-indigo-950/50 px-2 py-0.5 rounded-full">{{ $post->category }}</span>
                                </div>
                                <span class="text-xs text-gray-400">{{ $post->published_at ? $post->published_at->format('d M Y') : 'Draft' }}</span>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500 py-4 text-center">Belum ada kegiatan.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Announcements -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-6 space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-700 pb-3">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Pengumuman Terbaru</h3>
                        <a href="{{ route('admin.announcements.index') }}" class="text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">Kelola</a>
                    </div>
                    <div class="space-y-3">
                        @forelse($recentAnnouncements as $announcement)
                            <div class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-900/50 transition-colors duration-200">
                                <div class="space-y-1 max-w-[70%]">
                                    <h4 class="font-bold text-sm text-gray-800 dark:text-gray-200 truncate">{{ $announcement->title }}</h4>
                                    <p class="text-xs text-gray-400 truncate">{{ $announcement->description }}</p>
                                </div>
                                <span class="text-xs text-gray-400">{{ $announcement->published_at ? $announcement->published_at->format('d M Y') : 'Draft' }}</span>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500 py-4 text-center">Belum ada pengumuman.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
