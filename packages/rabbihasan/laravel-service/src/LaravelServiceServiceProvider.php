<?php

namespace Rabbihasan\LaravelService;

use Illuminate\Support\ServiceProvider;
use Rabbihasan\LaravelService\Commands\MakeServiceCommand;

class LaravelServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeServiceCommand::class,
            ]);
        }

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'service');
    }
}
