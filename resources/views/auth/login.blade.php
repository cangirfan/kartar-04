<x-guest-layout>
    <div class="space-y-7">
        <div class="space-y-2">
            <p class="text-sm font-bold uppercase tracking-[0.22em] text-emerald-600">Login Admin</p>
            <h1 class="text-3xl font-extrabold tracking-tight text-slate-950">Selamat datang kembali</h1>
            <p class="text-sm leading-6 text-slate-500">Masuk untuk mengelola konten website Karang Taruna RT.</p>
        </div>

        <x-auth-session-status class="rounded-2xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div class="space-y-2">
                <label for="email" class="block text-sm font-bold text-slate-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                       class="block w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                       placeholder="admin@email.com">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="space-y-2">
                <div class="flex items-center justify-between gap-4">
                    <label for="password" class="block text-sm font-bold text-slate-700">Password</label>
                    @if (Route::has('password.request'))
                        <a class="text-sm font-bold text-emerald-700 hover:text-emerald-800" href="{{ route('password.request') }}">
                            Lupa password?
                        </a>
                    @endif
                </div>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       class="block w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                       placeholder="Masukkan password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <label for="remember_me" class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-emerald-600 shadow-sm focus:ring-emerald-500" name="remember">
                <span class="text-sm font-semibold text-slate-600">Ingat saya di perangkat ini</span>
            </label>

            <button type="submit" class="w-full rounded-2xl bg-slate-950 px-5 py-3.5 text-sm font-extrabold text-white shadow-lg shadow-slate-900/20 transition hover:bg-emerald-700 focus:outline-none focus:ring-4 focus:ring-emerald-100">
                Masuk ke Dashboard
            </button>
        </form>

        <div class="border-t border-slate-100 pt-5 text-center">
            <a href="{{ route('home') }}" class="text-sm font-bold text-slate-500 hover:text-slate-900">Kembali ke website publik</a>
        </div>
    </div>
</x-guest-layout>