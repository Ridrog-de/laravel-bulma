<?php

namespace Ridrog\Bulma;

use Ridrog\Bulma\Console\Commands\AuthCommand;
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
                AuthCommand::class,
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
     * Load and publish Routes
     */
    public function views()
    {
        $this->loadViewsFrom(__DIR__.'/Views', $this->packageName);

        $this->publishes([
            __DIR__.'/Views' => resource_path('views/vendor/'.$this->packageName),
        ], $this->packageName.'-views');
    }

}
