<?php

namespace Ridrog\Bulma;

use Ridrog\Bulma\Console\Commands\MakeBulmaAuthCommand;
use Ridrog\Bulma\Console\Commands\PresetCommand;
use Illuminate\Support\ServiceProvider;

class BulmaServiceProvider extends ServiceProvider
{
    /**
     * Name of the Package
     *
     * @var string
     */
    public $packageName = 'bulma';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->defineCommands();

        $this->publishConfig();

        $this->loadRoutes();

        $this->views();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * This method only merges the first level of the configuration array.
         * If your users partially define a multi-dimensional configuration array, the missing options will not be merged.
         */
        $this->mergeConfigFrom(
            __DIR__.'/../config/bulma.php', $this->packageName
        );

        $this->app->bind('bulma', 'Ridrog\Bulma\Bulma');
    }

    /**
     * Define Commands
     */
    public function defineCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeBulmaAuthCommand::class,
                PresetCommand::class,
                // more
            ]);
        }
    }

    /**
     * Merge and publish Config
     */
    public function publishConfig()
    {
        $this->publishes([
            __DIR__.'/../config/bulma.php' => config_path($this->packageName.'.php')
        ], $this->packageName.'-config');
    }

    /**
     * Load Routes
     */
    public function loadRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
    }

    /**
     * Load and publish Routes
     */
    public function views()
    {
        $this->loadViewsFrom(__DIR__.'/Views', $this->packageName);

        $this->publishes([
            __DIR__.'/Views' => resource_path('views/vendor/'.$this->packageName),
        ], $this->packageName.'-views');
    }

    /**
     * Load and Publish Translations
     */
    public function translations()
    {
        $this->loadTranslationsFrom(__DIR__.'/Resources/Lang', $this->packageName);

        $this->publishes([
            __DIR__.'/path/to/translations' => resource_path('lang/vendor/courier'),
        ], $this->packageName.'-translations');
    }

}
