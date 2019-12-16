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
//        $this->publishes([
//            __DIR__.'/AuthenticateRedis.php' =>  base_path('app/Http/Middleware/AuthenticateRedis.php'),
//        ], 'public');
//        $this->publishes([
//            __DIR__.'/AuthDemoController.php' => base_path('app/Http/Controllers/AuthDemoController.php'),
//        ], 'public');
        $this->loadRoutesFrom(__DIR__.'/authRoute.php');
    }
}
