<?php

namespace App\Providers;

use App\Http\Controllers\AlbumController;
use App\Http\Gateway\Spotify;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Http\Controllers\AlbumController', function ($app) {
            return new AlbumController(new Spotify());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
