<?php

namespace Nickcheek\Brightree;

use Illuminate\Support\ServiceProvider;

class BrightreeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('brightree.php'),
            ], 'config');

                   }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'brightree');

        // Register the main class to use with the facade
        $this->app->singleton('brightree', function () {
            return new Brightree;
        });
    }
}
