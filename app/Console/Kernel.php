<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Service;
use App\Models\CustomerService;

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
         $schedule->call(function () {
            foreach(Service::where('status','Menunggu diproses')->whereDate('expired_at','<=',now())->get() as $service){ $service->update(['status'=>'expired']);}
        })->description('Expired ')->timezone('Asia/Jakarta')->cron('* * * * *');
        $schedule->call(function () {
            foreach(CustomerService::where('status','aktif')->whereDate('expired_at','<=',now())->get() as $service){ $service->update(['status'=>'expired']);}
        })->description('Expired ')->timezone('Asia/Jakarta')->cron('* * * * *');
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
