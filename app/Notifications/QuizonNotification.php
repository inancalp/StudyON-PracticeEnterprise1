<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class QuizonNotification extends Notification
{
    use Queueable;

    
    protected $studygroup;
    protected $question;
    protected $course;
    protected $user;
    
    public function __construct($studygroup, $question, $course, $user)
    {
        $this->studygroup = $studygroup;
        $this->question = $question;
        $this->course = $course;
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {   
        $data = [
            'question' => $this->question,
            'studygroup' => $this->studygroup,
            'course' => $this->course,
            'user' => $this->user,
            'date' => Carbon::now(),
        ];
        return $data;
                    
    }
    
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
