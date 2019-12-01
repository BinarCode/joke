<?php

namespace Binaryk\Joke;

use Binaryk\Joke\Console\JokeCommand;
use Binaryk\Joke\Controllers\JokeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class JokeServiceProvider extends ServiceProvider {

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                JokeCommand::class,
            ]);
        }

        Route::get(config('jokes.route'), JokeController::class);

        $this->loadViewsFrom(__DIR__. '/../resources/views', 'jokes');
        $this->publishes([
            __DIR__. '/../resources/views' => resource_path('views/vendor/jokes'),
        ],'views');
        $this->publishes([
            __DIR__. '/../config/jokes.php' => base_path('config/jokes.php'),
        ], 'config');
    }

    public function register()
    {
        $this->app->bind('joke', function() {
            return new JokeFactory();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/jokes.php', 'jokes');
    }
}
