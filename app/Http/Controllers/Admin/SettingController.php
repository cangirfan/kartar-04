<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class SettingController extends Controller
{
    /**
     * Show the form for editing the website settings.
     */
    public function edit()
    {
        $setting = Setting::first() ?? Setting::create([
            'website_name' => 'Karang Taruna RT 05',
            'address' => 'Jl. Pemuda No. 12',
            'latitude' => null,
            'longitude' => null,
            'whatsapp' => '628123456789',
            'email' => 'kartar@example.com',
            'donation_qr' => 'settings/qris_mockup.png',
        ]);

        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the website settings in storage.
     */
    public function update(Request $request)
    {
        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        $request->validate([
            'website_name' => 'required|string|max:255',
            'address' => 'required|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'whatsapp' => 'required|string|max:25',
            'email' => 'required|email|max:255',
            'logo' => 'nullable|image|max:1024',
            'banner' => 'nullable|image|max:2048',
            'donation_qr' => 'nullable|image|max:1024',
        ]);

        $logoPath = $setting->logo;
        $bannerPath = $setting->banner;
        $donationQrPath = $setting->donation_qr;

        // Process Logo
        if ($request->hasFile('logo')) {
            if (!empty($setting->logo) && Storage::disk('public')->exists($setting->logo)) {
                Storage::disk('public')->delete($setting->logo);
            }

            $file = $request->file('logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            
            if (!file_exists(storage_path('app/public/settings'))) {
                mkdir(storage_path('app/public/settings'), 0755, true);
            }

            try {
                // Resize logo to uniform dimensions
                $img = Image::read($file);
                $img->resize(150, 150);
                $img->save(storage_path('app/public/settings/' . $filename));
                $logoPath = 'settings/' . $filename;
            } catch (\Throwable $e) {
                // Fallback
                $logoPath = $file->storeAs('settings', $filename, 'public');
            }
        }

        // Process Banner
        if ($request->hasFile('banner')) {
            if (!empty($setting->banner) && Storage::disk('public')->exists($setting->banner)) {
                Storage::disk('public')->delete($setting->banner);
            }

            $file = $request->file('banner');
            $filename = 'banner_' . time() . '.' . $file->getClientOriginalExtension();
            
            if (!file_exists(storage_path('app/public/settings'))) {
                mkdir(storage_path('app/public/settings'), 0755, true);
            }

            try {
                // Resize banner to 1200x500
                $img = Image::read($file);
                $img->cover(1200, 500);
                $img->save(storage_path('app/public/settings/' . $filename));
                $bannerPath = 'settings/' . $filename;
            } catch (\Throwable $e) {
                // Fallback
                $bannerPath = $file->storeAs('settings', $filename, 'public');
            }
        }

        // Process Donation QR
        if ($request->hasFile('donation_qr')) {
            if (!empty($setting->donation_qr) && Storage::disk('public')->exists($setting->donation_qr)) {
                Storage::disk('public')->delete($setting->donation_qr);
            }

            $file = $request->file('donation_qr');
            $filename = 'donation_qr_' . time() . '.' . $file->getClientOriginalExtension();
            
            if (!file_exists(storage_path('app/public/settings'))) {
                mkdir(storage_path('app/public/settings'), 0755, true);
            }

            try {
                // Resize QR code to 400x400 square format
                $img = Image::read($file);
                $img->resize(400, 400);
                $img->save(storage_path('app/public/settings/' . $filename));
                $donationQrPath = 'settings/' . $filename;
            } catch (\Throwable $e) {
                // Fallback
                $donationQrPath = $file->storeAs('settings', $filename, 'public');
            }
        }

        // Clean whatsapp number
        $whatsapp = preg_replace('/[^0-9]/', '', $request->whatsapp);
        if (str_starts_with($whatsapp, '0')) {
            $whatsapp = '62' . substr($whatsapp, 1);
        }

        $setting->fill([
            'website_name' => $request->website_name,
            'address' => $request->address,
            'latitude' => $request->filled('latitude') ? $request->latitude : null,
            'longitude' => $request->filled('longitude') ? $request->longitude : null,
            'whatsapp' => $whatsapp,
            'email' => $request->email,
            'logo' => $logoPath,
            'banner' => $bannerPath,
            'donation_qr' => $donationQrPath,
        ]);

        $setting->save();

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}

