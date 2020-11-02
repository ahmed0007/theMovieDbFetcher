<?php

namespace App\Providers;

use App\Models\Genre;
use App\Repositories\Genre\GenreRepository;
use App\Repositories\Genre\GenreRepositoryContract;
use App\Repositories\Movie\MovieRepository;
use App\Repositories\Movie\MovieRepositoryContract;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GenreRepositoryContract::class, GenreRepository::class);
        $this->app->bind(MovieRepositoryContract::class, MovieRepository::class);


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
