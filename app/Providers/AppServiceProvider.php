<?php

namespace App\Providers;

use App\Weather;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('weather', Weather::current_weather('odessa,ua')->temp);
        view()->share('icon', Weather::current_weather('odessa,ua')->icon);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
