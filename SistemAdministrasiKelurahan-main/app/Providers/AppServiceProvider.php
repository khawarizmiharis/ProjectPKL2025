<?php

namespace App\Providers;

use App\VillageIdentity;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        // Ambil logo sekali saja
        $villageIdentity = VillageIdentity::first();

        // Share ke semua view
        View::share('globalVillageIdentity', $villageIdentity);

        // Share villageIdentity ke semua view
        View::share('villageIdentity', VillageIdentity::first());

        View::composer('*', function ($view) {
        $view->with('villageIdentity', VillageIdentity::first());
    });
        // make the asset() can run on both http or https
        // asset() generate http
        // secure_asset() generate https

        // if (env('APP_ENV') != 'local') {
        //     // take scheme as a parameter
        //     URL::forceScheme('https');
        // }
    }
}
