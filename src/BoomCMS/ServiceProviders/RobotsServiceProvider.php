<?php

namespace BoomCMS\ServiceProviders;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class RobotsServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../views/boomcms', 'boomcms');
        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'boomcms');

        $this->publishes([
            __DIR__.'/../../../public'           => public_path('vendor/boomcms/boom-robotstxt'),
            __DIR__.'/../../database/migrations' => base_path('/migrations/boomcms'),
        ], 'boomcms');

        include __DIR__.'/../../routes.php';
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/menu.php', 'boomcms.menu');
    }
}
