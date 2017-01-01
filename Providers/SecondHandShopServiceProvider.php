<?php

namespace Gkiokan\SecondHandShop\Providers;

use Illuminate\Support\ServiceProvider;

class SecondHandShopServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
        // $loader = AliasLoader::getInstance();
        // $loader->alias('Magic', '\Gkiokan\Profile\Helpers\CallMe');
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('secondhandshop.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'secondhandshop'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/secondhandshop');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/secondhandshop';
        }, \Config::get('view.paths')), [$sourcePath]), 'secondhandshop');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/secondhandshop');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'secondhandshop');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'secondhandshop');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
