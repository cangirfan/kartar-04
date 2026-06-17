<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('settings')) {
            $settings = Setting::first() ?? new Setting([
                'website_name' => 'Karang Taruna RT 05',
                'logo' => null,
                'banner' => null,
                'donation_qr' => 'settings/qris_mockup.png',
                'address' => 'Jl. Pemuda No. 12',
                'whatsapp' => '628123456789',
                'email' => 'kartar@example.com'
            ]);
            View::share('gSettings', $settings);
        }
    }
}
