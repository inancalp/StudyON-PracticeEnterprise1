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

    public function __construct($studygroup, $message)
    {
        $this->studygroup = $studygroup;
        $this->message = $message;
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
            'user' => $notifiable,
            'date' => Carbon::now(),
        ];
        // dd($this->message);
        // dd($data);
        return $data;
                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
