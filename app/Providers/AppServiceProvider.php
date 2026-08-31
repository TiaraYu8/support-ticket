<?php

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;
use Laravel\Boost\BoostServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerLocalDevelopment();
    }

    private function registerLocalDevelopment(): void
    {
        if (! $this->app->isLocal()) {
            return;
        }

        foreach ([
            IdeHelperServiceProvider::class,
            BoostServiceProvider::class,
        ] as $provider) {
            if (class_exists($provider)) {
                $this->app->register($provider);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
