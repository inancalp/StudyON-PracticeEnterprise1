<?php

namespace App\Console;

use App\Models\Question;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Models\Questionbank;

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
            $now = Carbon::now();
            $questions =  Question::get();
            foreach($questions as $question){
                $then = new Carbon($question->created_at);
                $difference = ($then->diff($now)->days);
                if($difference >= 7){
                    $bank_question = new Questionbank();
                    $bank_question->studygroup_id = $question->studygroup_id;
                    $bank_question->question = $question->asked_question;
                    $bank_question->correct_answer = $question->correct_answer;
                    $bank_question->push();
                    $question->delete();
                }
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