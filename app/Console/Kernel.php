<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\DatabaseBackUp'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('backup:run --only-db')->withoutOverlapping()->dailyAt('6:00');
        $Hour=DB::select("select * FROM applicationsettings WHERE ModuleName='AutobackupSetting' AND SettingName='Hour'");
        $Minute=DB::select("select * FROM applicationsettings WHERE ModuleName='AutobackupSetting' AND SettingName='Minute'");

        $Hour=$Hour[0]->SettingValue;
        $Minute=$Minute[0]->SettingValue;
        $time=$Hour.":".$Minute;
        $schedule->command('backup:run --only-db')->withoutOverlapping()->timezone('Asia/Kolkata')
          ->dailyAt($time);
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
