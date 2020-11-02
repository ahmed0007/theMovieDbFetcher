<?php

namespace App\Console\Commands;

use App\Jobs\FetchGenres;
use App\Jobs\FetchTopRatedMovies;
use Illuminate\Console\Command;


class MovieCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        FetchGenres::withChain([
            new FetchTopRatedMovies,
        ])->dispatch();

        // FetchGenres::dispatch();
        // FetchTopRatedMovies::dispatch();

    }
}
