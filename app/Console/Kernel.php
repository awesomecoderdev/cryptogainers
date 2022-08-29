<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // $schedule->call(function () {
        //     Log::info("Runnning cron job" . rand(0, 100));
        // })->everyMinute();

        // $schedule->command('import:coinlist')->everyMinute();


        // import exchanges from coingecko
        $schedule->command('import:exchanges')->dailyAt('11:00');

        // update exchanges from json to database
        $schedule->command('update:exchanges')->dailyAt('11:00');

        // update exist images
        $schedule->command('remove:media')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
