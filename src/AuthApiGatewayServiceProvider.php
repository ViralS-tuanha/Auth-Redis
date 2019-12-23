<?php

namespace TuanHA\AuthApiGateway;

use Illuminate\Support\ServiceProvider;

class AuthApiGatewayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/authms.php' => config_path('authms.php'),
        ], 'public');
        $this->loadViewsFrom(__DIR__, 'login_customize');
        $this->loadRoutesFrom(__DIR__.'/authRoute.php');
    }
}
