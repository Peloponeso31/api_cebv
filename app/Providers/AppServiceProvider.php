<?php

namespace App\Providers;

use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Observers\HechoDesaparicionObserver;
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
        HechoDesaparicion::observe(HechoDesaparicionObserver::class);
    }
}
