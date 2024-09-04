<?php

namespace LearnMonorepo;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class CommonServiceProvider extends IlluminateServiceProvider
{
    public function boot()
    {
        if (app()->runningInConsole()) {
            $this->registerPublishables();

            $this->registerCommands();
        }

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'common');
    }

    public function register()
    {
        if (! app()->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../config.php', 'common');
        }
    }

    protected function registerPublishables()
    {
        $this->publishes([
            __DIR__.'/../config.php' => \config_path('common.php'),
        ], ['common-config']);
    }

    protected function registerCommands()
    {
        $this->commands([]);
    }
}
