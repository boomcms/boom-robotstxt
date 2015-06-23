<?php

namespace BoomCMS\Robots;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Routing\Router;

class ServiceProvider extends BaseServiceProvider
{
    /**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
    public function boot(Router $router, Asset\Provider $assetProvider, Page\Provider $pageProvider)
    {
        $this->loadViewsFrom(__DIR__ . '/../../views/boom', 'boom');
		$this->loadTranslationsFrom(__DIR__ . '/../../lang', 'boom');

        $this->publishes([
			__DIR__ . '/../../../public' => public_path('vendor/boomcms/boom-robotstxt'),
			__DIR__ . '/../../database/migrations' => database_path('/migrations/boomcms'),
		], 'boomcms');
		
        include __DIR__ . '/../../routes.php';
    }

    /**
	 *
	 * @return void
	 */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/boomcms.php', 'boomcms');
    }
}