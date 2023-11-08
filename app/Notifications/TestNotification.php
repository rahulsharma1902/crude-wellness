<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TestNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $data;
  

    public function __construct($data)
    {
        $this->data = $data;
    }

    
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->name('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    
    public function toArray(object $notifiable): array
    {
        return [
            'success'=> 'successfully completed'
        ];
    }
}
