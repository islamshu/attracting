<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPlacedNotification extends Notification
{
    use Queueable;

    
  

    public function via($notifiable)
    {
        return ['database'];

    }

    
    public function toArray($notifiable)
    {
        return [
            'type' => 'order',
            'title' => trans('There is a new reservation'),
            'desc' => trans('A user has booked a new worker'),
        ];
    }
}
