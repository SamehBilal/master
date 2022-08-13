<?php

namespace App\Notifications;

use App\Models\Subscribe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewSubscriber extends Notification
{
    use Queueable;
    private $subscribe;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Subscribe $subscribe)
    {
        $this->subscribe = $subscribe;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'/*,'mail'*/];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('noreply@droplin.com', 'Droplin')
            ->subject('New Subscribe')
            ->line('A new subscribe from '.$this->subscribe->email.'.')
            ->action('New Subscribe', route('dashboard.subscribes.show',$this->subscribe->id))
            ->line('Thank you for using our application!');
    }

    /*public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id'                => $this->subscribe->id,
            'email'             => $this->subscribe->email,
            'user'              => $notifiable,
        ]);
    }*/

    public function toDatabase($notifiable)
    {
        return [
            'id'                => $this->subscribe->id,
            'email'             => $this->subscribe->email,
            'user'              => $notifiable,
        ];
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
