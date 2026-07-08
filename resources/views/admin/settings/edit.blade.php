<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengaturan Website') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-50 dark:bg-emerald-950/30 text-emerald-800 dark:text-emerald-300 text-sm font-medium border border-emerald-100 dark:border-emerald-900">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-150 dark:border-gray-700 p-6 sm:p-10">
                
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Website Name -->
                        <div class="space-y-1">
                            <label for="website_name" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Nama Organisasi / Website</label>
                            <input type="text" name="website_name" id="website_name" value="{{ old('website_name', $setting->website_name) }}" 
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600" required>
                            @error('website_name')
                                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="space-y-1">
                            <label for="email" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Alamat Email Kontak</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $setting->email) }}" 
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600" required>
                            @error('email')
                                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- WhatsApp -->
                        <div class="space-y-1">
                            <label for="whatsapp" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Nomor WhatsApp Admin</label>
                            <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $setting->whatsapp) }}" 
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600" required>
                            @error('whatsapp')
                                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="space-y-1 md:col-span-2">
                            <label for="address" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Alamat Sekretariat</label>
                            <textarea name="address" id="address" rows="3" 
                                      class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600" required>{{ old('address', $setting->address) }}</textarea>
                            @error('address')
                                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Map Coordinates -->
                        <div class="space-y-1">
                            <label for="latitude" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Latitude Peta</label>
                            <input type="number" step="any" name="latitude" id="latitude" value="{{ old('latitude', $setting->latitude) }}"
                                   placeholder="-6.200000"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600">
                            <p class="text-xs text-gray-400">Isi koordinat agar pin peta tepat di lokasi sekretariat.</p>
                            @error('latitude')
                                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="longitude" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Longitude Peta</label>
                            <input type="number" step="any" name="longitude" id="longitude" value="{{ old('longitude', $setting->longitude) }}"
                                   placeholder="106.816666"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600">
                            <p class="text-xs text-gray-400">Ambil dari Google Maps dengan klik kanan titik lokasi, lalu salin angka koordinat.</p>
                            @error('longitude')
                                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <hr class="border-gray-100 dark:border-gray-750">

                    <!-- Graphic Assets -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Logo Upload -->
                        <div class="space-y-4">
                            <label for="logo" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Logo Organisasi</label>
                            
                            @if(!empty($setting->logo))
                                <div class="w-24 h-24 rounded-2xl overflow-hidden bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 flex items-center justify-center p-2">
                                    <img class="max-w-full max-h-full object-contain" src="{{ asset('storage/' . $setting->logo) }}" alt="Logo">
                                </div>
                            @endif

                            <input type="file" name="logo" id="logo" 
                                   class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 focus:outline-none">
                            <p class="text-xs text-gray-400">Dimensi ideal 150x150 px. Maksimal 1MB.</p>
                            @error('logo')
                                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Banner Upload -->
                        <div class="space-y-4">
                            <label for="banner" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Hero Banner Utama</label>
                            
                            @if(!empty($setting->banner))
                                <div class="w-full aspect-video max-h-24 rounded-2xl overflow-hidden bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700">
                                    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $setting->banner) }}" alt="Banner">
                                </div>
                            @endif

                            <input type="file" name="banner" id="banner" 
                                   class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 focus:outline-none">
                            <p class="text-xs text-gray-400">Dimensi ideal 1200x500 px. Maksimal 2MB.</p>
                            @error('banner')
                                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Donation QR Upload -->
                        <div class="space-y-4">
                            <label for="donation_qr" class="block text-sm font-bold text-gray-700 dark:text-gray-300">Barcode Donasi (QRIS)</label>
                            
                            @if(!empty($setting->donation_qr))
                                <div class="w-24 h-24 rounded-2xl overflow-hidden bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 flex items-center justify-center p-2">
                                    <img class="max-w-full max-h-full object-contain" src="{{ asset('storage/' . $setting->donation_qr) }}" alt="Barcode Donasi">
                                </div>
                            @endif

                            <input type="file" name="donation_qr" id="donation_qr" 
                                   class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 focus:outline-none">
                            <p class="text-xs text-gray-400">Dimensi ideal 400x400 px. Maksimal 1MB.</p>
                            @error('donation_qr')
                                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end gap-4 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <button type="submit" class="px-8 py-3.5 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-md shadow-indigo-600/10 transition-colors">
                            Simpan Pengaturan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

