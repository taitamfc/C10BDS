<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use App\Console\Commands\ProductExpriedCommand;
use App\Console\Commands\ProductNotifyCommand;
use App\Console\Commands\MessageSending;

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
        // $schedule->call(function () {
        //     DB::table('products')->delete();
        // })->daily();
        $schedule->command(ProductNotifyCommand::class)->everyMinute();
        // $schedule->command('MessageCommand')->everyMinute();
        $schedule->command(ProductExpriedCommand::class)->everyMinute();
        $schedule->command(MessageSending::class)->everyMinute();
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
