<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share([
            'site_name' => 'Watec Distribution',
            'site_fb' => 'https://www.facebook.com/watecdistribution/',
            'site_linkedin' => 'https://www.linkedin.com/company/watecdistribution/',
            'site_twitter' => '#',
            'site_instagram' => 'https://www.instagram.com/watec_distribution',
            'site_youtube' => '#',
            'site_link' => '',
        ]);
    }
}
