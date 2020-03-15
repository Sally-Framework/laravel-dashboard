<?php

namespace Sally\Dashboard;

use Illuminate\Support\ServiceProvider;
use Sally\Dashboard\Helpers\Config;
use Yoeunes\Toastr\ToastrServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        $this->app->make('Sally\Dashboard\Controller\MainController');
        $this->app->make('Sally\Dashboard\Controller\StatisticController');

        $this->loadViewsFrom(__DIR__.'/resources/views', 'dashboard');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';

        $configFileName = Config::CONFIG_FILE_NAME;
        $this->publishes([
            __DIR__.'/config.php' => config_path("{$configFileName}.php"),
        ], 'config');

        $this->publishes([
            __DIR__ . '/resources' => public_path('n0tm/dashboard'),
        ], 'public');
    }

    public function provides()
    {
        return [ToastrServiceProvider::class];
    }
}
