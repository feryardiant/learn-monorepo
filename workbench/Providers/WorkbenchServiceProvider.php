<?php

namespace Workbench\Providers;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\ServiceProvider;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (app()->runningInConsole()) {
            $this->commands([]);
        }

        tap(app()->make('config'), function (Repository $config) {
            $config->set('app.locale', 'id');
            $config->set('app.faker_locale', 'id_ID');
        });
    }
}
