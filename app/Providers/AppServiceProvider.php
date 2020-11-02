<?php

namespace App\Providers;

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

        $this->app->bind(Genre::class, function ($app) {
            return new Genre();
        });

        // $this->app->when(GenreRepository::class)
        //   ->needs(Genre::class)
        //   ->give(function () {
        //       return  (new Genre());
        //   });
        //
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
