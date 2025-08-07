<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeNotification extends Notification {

    public function toMail($notifiable) {
        return (new MailMessage)
                        ->greeting('Hello!')
                        ->line('Thank you for registering!')
                        ->action('Visit Website', url('/'))
                        ->line('Thank you for using our application!');
    }

}
