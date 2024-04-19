<?php

namespace Laltu\LaravelEnvato;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LaravelEnvatoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'laravel-maker');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-maker');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->registerAuthorization();
        $this->registerRoutes();
        $this->registerResources();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-envato.php' => config_path('laravel-envato.php'),
            ], 'config');

            // Publishing assets.
            $this->publishes([
                __DIR__ . '/../public' => public_path('vendor/laravel-envato'),
            ], ['assets', 'laravel-assets']);
        }

        // Registering package commands.
        $this->commands([]);
    }

    /**
     * Register the package authorization.
     */
    protected function registerAuthorization(): void
    {
        $this->callAfterResolving(Gate::class, function (Gate $gate, Application $app) {
            $gate->define('viewPulse', fn($user = null) => $app->environment('local'));
        });
    }

    protected function registerRoutes(): void
    {
        Route::middleware([])->group(function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    /**
     * Register the package's resources.
     */
    protected function registerResources(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-envato');
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-envato.php', 'laravel-envato');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-envato', function () {
            return new \Laltu\LaravelEnvato\Facades\LaravelEnvato();
        });
    }
}
