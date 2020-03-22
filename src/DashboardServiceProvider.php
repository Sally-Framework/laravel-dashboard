<?php

namespace Sally\Dashboard;

use Illuminate\Support\ServiceProvider;
use Sally\Dashboard\Domain\Statistic;
use Sally\Dashboard\Helpers\ConfigHelper;
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
	    $this->app->bind(
	    	Statistic\Interfaces\CompositeInterface::class,
		    Statistic\Composite::class
	    );
	    $this->app->bind(
	    	Statistic\Interfaces\Type\FactoryInterface::class,
		    Statistic\Type\Factory::class
	    );
	    $this->app->bind(
		    Statistic\Interfaces\Type\Common\FactoryInterface::class,
		    Statistic\Type\Common\Factory::class
	    );
	    $this->app->bind(
		    Statistic\Interfaces\Type\Diagram\FactoryInterface::class,
		    Statistic\Type\Diagram\Factory::class
	    );
	    $this->app->bind(
		    Statistic\Interfaces\Type\Diagram\Item\FactoryInterface::class,
		    Statistic\Type\Diagram\Item\Factory::class
	    );

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

        $configFileName = ConfigHelper::CONFIG_FILE_NAME;
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
