<?php

namespace Laltu\LaravelEnvato;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laltu\LaravelEnvato\Facades\LaravelEnvato;
use Laltu\LaravelEnvato\Livewire\AdminSetup;
use Laltu\LaravelEnvato\Livewire\Complete;
use Illuminate\Contracts\Foundation\Application;
use Laltu\LaravelEnvato\Livewire\DatabaseSetup;
use Laltu\LaravelEnvato\Livewire\Installation;
use Laltu\LaravelEnvato\Livewire\MailSetup;
use Laltu\LaravelEnvato\Livewire\PreInstallation;
use Laltu\LaravelEnvato\Livewire\PurchaseCode;
use Illuminate\View\Compilers\BladeCompiler;

use Laltu\LaravelEnvato\Middleware\LicenseGuardMiddleware;
use Livewire\Livewire;

class LaravelEnvatoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(Router $router): void
    {
        /*
         * Optional methods to load your package assets
         */
//         $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-envato');
//         $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-envato');
//         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
//         $this->loadRoutesFrom(__DIR__.'../../routes.php');
        $this->loadMiddlewares($router);

        $this->registerAuthorization();
        $this->registerRoutes();
        $this->registerResources();
        $this->registerLivewireComponents();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-envato.php' => config_path('envato.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-envato'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-envato'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-envato'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-envato.php', 'envato');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-envato', function () {
            return new \Laltu\LaravelEnvato\Facades\LaravelEnvato();
        });
    }

    /**
     * Register the package authorization.
     */
    protected function registerAuthorization(): void
    {
        $this->callAfterResolving(Gate::class, function (Gate $gate, Application $app) {
            $gate->define('viewPulse', fn ($user = null) => $app->environment('local'));
        });
    }

    /**
     * Register the package's resources.
     */
    protected function registerResources(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-envato');
    }

    protected function registerRoutes(): void
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    protected function routeConfiguration(): array
    {
        return [
            'prefix' => config('laravel-envato.prefix', 'install'),
            'as' => config('laravel-envato.name', 'install.'),
            'middleware' => config('laravel-envato.middleware'),
        ];
    }

    /**
     * Register Livewire components.
     *
     * @return LaravelEnvatoServiceProvider
     */
    protected function registerLivewireComponents(): LaravelEnvatoServiceProvider
    {
        $this->callAfterResolving(BladeCompiler::class, function () {

            Livewire::component('laravel-envato.installation', Installation::class);
            Livewire::component('laravel-envato.admin-setup', AdminSetup::class);
            Livewire::component('laravel-envato.database-setup', DatabaseSetup::class);
            Livewire::component('laravel-envato.mail-setup', MailSetup::class);
            Livewire::component('laravel-envato.purchase-code', PurchaseCode::class);
            Livewire::component('laravel-envato.pre-installation', PreInstallation::class);
            Livewire::component('laravel-envato.complete', Complete::class);
        });

        return $this;

    }


    /**
     * Load custom middlewares
     *
     * @param Router $router
     */
    private function loadMiddlewares(Router $router): void
    {
        $router->aliasMiddleware('license-connector', LicenseGuardMiddleware::class);
    }
}
