<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUser extends Notification
{
    use Queueable;
    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
            ->subject('New User')
            ->line('A new user has been created with the email of ('.$this->user->email.')')
            ->action('New user', route('dashboard.users.index'))
            ->line('Thank you for using our application!');
    }

    /*public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id'                => $this->user->id,
            'first_name'        => $this->user->first_name,
            'last_name'         => $this->user->last_name,
            'full_name'         => $this->user->full_name,
            'email'             => $this->user->email,
            'username'          => $this->user->username,
            'gender'            => $this->user->gender,
            'phone'             => $this->user->phone,
            'status'            => $this->user->status,
            'user'              => $notifiable,
        ]);
    }*/

    public function toDatabase($notifiable)
    {
        return [
            'id'                => $this->user->id,
            'first_name'        => $this->user->first_name,
            'last_name'         => $this->user->last_name,
            'full_name'         => $this->user->full_name,
            'email'             => $this->user->email,
            'username'          => $this->user->username,
            'gender'            => $this->user->gender,
            'phone'             => $this->user->phone,
            'status'            => $this->user->status,
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
