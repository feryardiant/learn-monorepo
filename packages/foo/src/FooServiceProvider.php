<?php

namespace LearnMonorepo;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class FooServiceProvider extends IlluminateServiceProvider
{
    public function boot()
    {
        if (app()->runningInConsole()) {
            $this->registerPublishables();

            $this->registerCommands();
        }

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'foo');
    }

    public function register()
    {
        if (! app()->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../config.php', 'foo');
        }
    }

    protected function registerPublishables()
    {
        $this->publishes([
            __DIR__.'/../config.php' => \config_path('foo.php'),
        ], ['foo-config']);
    }

    protected function registerCommands()
    {
        $this->commands([]);
    }
}
