<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();

        Filament::serving(static function () {
            Filament::registerViteTheme('resources/css/filament.css');
        });
    }
}
