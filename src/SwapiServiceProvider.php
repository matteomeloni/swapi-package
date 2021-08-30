<?php

namespace Matteomeloni\Swapi;

use Illuminate\Support\ServiceProvider;
use Matteomeloni\Swapi\Commands\RetrieveSwapiData;

class SwapiServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
         $this->loadMigrationsFrom(__DIR__.'/database/migrations');

         $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/swapi.php', 'swapi');

        // Register the service the package provides.
        $this->app->singleton('swapi', function ($app) {
            return new Swapi;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['swapi'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/swapi.php' => config_path('swapi.php'),
        ], 'swapi.config');

        // Registering package commands.
         $this->commands([
             RetrieveSwapiData::class
         ]);
    }
}
