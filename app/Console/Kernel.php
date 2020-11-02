<?php

namespace App\Console;

use App\Jobs\FetchRecentMovies;
use App\Jobs\FetchTopRatedMovies;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\MovieCron;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        MovieCron::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('movie:cron')
                 ->everyMinute();
        // $schedule->job(new FetchTopRatedMovies())
        // ->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
