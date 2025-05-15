<?php

namespace App\Providers;

use App\Models\Time;
use App\Observers\TiempoObserver;
use Illuminate\Support\ServiceProvider;

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
        Time::observe(TiempoObserver::class);
    }
}
