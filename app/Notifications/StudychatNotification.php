<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class StudychatNotification extends Notification
{
    use Queueable;

    
    protected $studygroup;
    protected $message; 
    protected $user;
    
    public function __construct($studygroup, $message, $user)
    {
        $this->studygroup = $studygroup;
        $this->message = $message;
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {   
    
        $data = [
            'message' => $this->message,
            'studygroup' => $this->studygroup,
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
