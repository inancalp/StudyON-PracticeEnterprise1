<?php

namespace App\Console;

use App\Models\Question;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
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
       
        $schedule->call(function(){
            $current = Carbon::now()->format("d");
            $q = Question::find(1);
            $q_date = $q->created_at->format("d");
            $current_int = intval($current);
            $q_int = intval($q_date);
            $diff = $current_int - $q_int;

            if($diff >= 7){
                $q->delete();
                Log::info("Question DELETED");
            }
            else{
                Log::info("Question on HOLD");
            }
        })->everyMinute();

       
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
