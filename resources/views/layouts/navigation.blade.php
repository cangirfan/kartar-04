@php
    $navItems = [
        ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'active' => 'admin.dashboard', 'icon' => 'M3 13.125C3 12.504 3.504 12 4.125 12h5.25c.621 0 1.125.504 1.125 1.125v6.75C10.5 20.496 9.996 21 9.375 21h-5.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM13.5 4.125C13.5 3.504 14.004 3 14.625 3h5.25C20.496 3 21 3.504 21 4.125v6.75C21 11.496 20.496 12 19.875 12h-5.25a1.125 1.125 0 0 1-1.125-1.125v-6.75ZM3 4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v3.75C10.5 8.496 9.996 9 9.375 9h-5.25A1.125 1.125 0 0 1 3 7.875v-3.75ZM13.5 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v3.75C21 20.496 20.496 21 19.875 21h-5.25a1.125 1.125 0 0 1-1.125-1.125v-3.75Z'],
        ['label' => 'Kegiatan', 'route' => 'admin.posts.index', 'active' => 'admin.posts.*', 'icon' => 'M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M5.25 5.25h13.5A1.5 1.5 0 0 1 20.25 6.75v12A1.5 1.5 0 0 1 18.75 20.25H5.25A1.5 1.5 0 0 1 3.75 18.75v-12A1.5 1.5 0 0 1 5.25 5.25Z'],
        ['label' => 'Kategori', 'route' => 'admin.categories.index', 'active' => 'admin.categories.*', 'icon' => 'M4.5 6.75h15M4.5 12h15M4.5 17.25h15'],
        ['label' => 'Pengumuman', 'route' => 'admin.announcements.index', 'active' => 'admin.announcements.*', 'icon' => 'M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 0 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38a.75.75 0 0 1-1.085-.37 12.047 12.047 0 0 1-.7-4.304m1.92 0a24.16 24.16 0 0 0 8.91 2.226m-8.91-11.406a24.16 24.16 0 0 1 8.91-2.226m0 0v13.632m0-13.632c.828 0 1.5 3.052 1.5 6.816s-.672 6.816-1.5 6.816'],
        ['label' => 'Galeri', 'route' => 'admin.galleries.index', 'active' => 'admin.galleries.*', 'icon' => 'm2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 19.5h16.5A1.5 1.5 0 0 0 21.75 18V6A1.5 1.5 0 0 0 20.25 4.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Z'],
        ['label' => 'Pengurus', 'route' => 'admin.managements.index', 'active' => 'admin.managements.*', 'icon' => 'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z'],
        ['label' => 'UMKM', 'route' => 'admin.umkms.index', 'active' => 'admin.umkms.*', 'icon' => 'M13.5 21v-7.5A1.5 1.5 0 0 0 12 12h0a1.5 1.5 0 0 0-1.5 1.5V21M3 9l9-6 9 6M4.5 10.5V21h15V10.5'],
        ['label' => 'Settings', 'route' => 'admin.settings.edit', 'active' => 'admin.settings.*', 'icon' => 'M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.66.84.12.053.239.11.356.17.325.167.717.14 1.018-.07l1.09-.763a1.125 1.125 0 0 1 1.45.12l1.833 1.833c.389.389.44 1.002.12 1.45l-.763 1.09c-.21.301-.237.693-.07 1.018.06.117.117.236.17.356.154.347.466.597.84.66l1.281.213c.542.09.94.56.94 1.11v2.593c0 .55-.398 1.02-.94 1.11l-1.281.213c-.374.063-.686.313-.84.66-.053.12-.11.239-.17.356-.167.325-.14.717.07 1.018l.763 1.09c.32.448.269 1.061-.12 1.45l-1.833 1.833a1.125 1.125 0 0 1-1.45.12l-1.09-.763c-.301-.21-.693-.237-1.018-.07a6.977 6.977 0 0 1-.356.17c-.347.154-.597.466-.66.84l-.213 1.281c-.09.542-.56.94-1.11.94h-2.593c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.063-.374-.313-.686-.66-.84a6.977 6.977 0 0 1-.356-.17c-.325-.167-.717-.14-1.018.07l-1.09.763a1.125 1.125 0 0 1-1.45-.12l-1.833-1.833a1.125 1.125 0 0 1-.12-1.45l.763-1.09c.21-.301.237-.693.07-1.018a6.977 6.977 0 0 1-.17-.356c-.154-.347-.466-.597-.84-.66l-1.281-.213A1.125 1.125 0 0 1 2.25 15.75v-2.593c0-.55.398-1.02.94-1.11l1.281-.213c.374-.063.686-.313.84-.66.053-.12.11-.239.17-.356.167-.325.14-.717-.07-1.018l-.763-1.09a1.125 1.125 0 0 1 .12-1.45L6.6 5.427a1.125 1.125 0 0 1 1.45-.12l1.09.763c.301.21.693.237 1.018.07.117-.06.236-.117.356-.17.347-.154.597-.466.66-.84l.213-1.281ZM15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z'],
    ];
@endphp

<nav x-data="{ open: false }">
    <div class="fixed inset-y-0 left-0 z-40 hidden w-72 border-r border-slate-200 bg-white px-4 py-5 dark:border-slate-800 dark:bg-slate-950 lg:flex lg:flex-col">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3">
            <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-950 text-white shadow-lg shadow-slate-900/20 dark:bg-white dark:text-slate-950">
                <x-application-logo class="h-6 w-6 fill-current" />
            </span>
            <span>
                <span class="block text-base font-extrabold text-slate-950 dark:text-white">Admin Kartar</span>
                <span class="block text-xs font-bold uppercase tracking-wider text-emerald-600">Content Manager</span>
            </span>
        </a>

        <div class="mt-8 flex-1 space-y-1">
            @foreach($navItems as $item)
                @php($isActive = request()->routeIs($item['active']))
                <a href="{{ route($item['route']) }}" class="group flex items-center gap-3 rounded-2xl px-3 py-3 text-sm font-bold transition {{ $isActive ? 'bg-slate-950 text-white shadow-lg shadow-slate-900/15 dark:bg-white dark:text-slate-950' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950 dark:text-slate-400 dark:hover:bg-slate-900 dark:hover:text-white' }}">
                    <svg class="h-5 w-5 flex-none" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                    </svg>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </div>

        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-800 dark:bg-slate-900/70">
            <p class="text-sm font-extrabold text-slate-900 dark:text-white">{{ Auth::user()->name }}</p>
            <p class="mt-1 truncate text-xs font-medium text-slate-500 dark:text-slate-400">{{ Auth::user()->email }}</p>
            <div class="mt-4 grid grid-cols-2 gap-2">
                <a href="{{ route('profile.edit') }}" class="rounded-2xl bg-white px-3 py-2 text-center text-xs font-bold text-slate-700 shadow-sm hover:text-emerald-700 dark:bg-slate-950 dark:text-slate-200">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full rounded-2xl bg-slate-950 px-3 py-2 text-xs font-bold text-white shadow-sm hover:bg-rose-700 dark:bg-white dark:text-slate-950">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <div class="sticky top-0 z-40 border-b border-slate-200 bg-white/90 backdrop-blur dark:border-slate-800 dark:bg-slate-950/90 lg:hidden">
        <div class="flex h-16 items-center justify-between px-4">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-950 text-white dark:bg-white dark:text-slate-950">
                    <x-application-logo class="h-5 w-5 fill-current" />
                </span>
                <span class="font-extrabold text-slate-950 dark:text-white">Admin Kartar</span>
            </a>
            <button type="button" @click="open = ! open" class="inline-flex h-10 w-10 items-center justify-center rounded-2xl border border-slate-200 text-slate-700 dark:border-slate-800 dark:text-slate-200">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div x-show="open" x-transition class="border-t border-slate-200 px-4 py-4 dark:border-slate-800" style="display: none;">
            <div class="space-y-1">
                @foreach($navItems as $item)
                    @php($isActive = request()->routeIs($item['active']))
                    <a href="{{ route($item['route']) }}" class="flex items-center gap-3 rounded-2xl px-3 py-3 text-sm font-bold {{ $isActive ? 'bg-slate-950 text-white dark:bg-white dark:text-slate-950' : 'text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-900' }}">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                        </svg>
                        <span>{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </div>

            <div class="mt-4 border-t border-slate-200 pt-4 dark:border-slate-800">
                <p class="px-3 text-sm font-extrabold text-slate-900 dark:text-white">{{ Auth::user()->name }}</p>
                <p class="px-3 text-xs text-slate-500">{{ Auth::user()->email }}</p>
                <div class="mt-3 grid grid-cols-2 gap-2">
                    <a href="{{ route('profile.edit') }}" class="rounded-2xl border border-slate-200 px-3 py-2 text-center text-sm font-bold text-slate-700 dark:border-slate-800 dark:text-slate-200">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full rounded-2xl bg-slate-950 px-3 py-2 text-sm font-bold text-white dark:bg-white dark:text-slate-950">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>