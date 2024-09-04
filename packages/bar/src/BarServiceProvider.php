<?php

namespace LearnMonorepo;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class BarServiceProvider extends IlluminateServiceProvider
{
    public function boot()
    {
        if (app()->runningInConsole()) {
            $this->registerPublishables();

            $this->registerCommands();
        }

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'bar');
    }

    public function register()
    {
        if (! app()->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../config.php', 'bar');
        }
    }

    protected function registerPublishables()
    {
        $this->publishes([
            __DIR__.'/../config.php' => \config_path('bar.php'),
        ], ['bar-config']);
    }

    protected function registerCommands()
    {
        $this->commands([]);
    }
}
