<?php

namespace App\Notifications;

use App\Models\TicketChat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class NewTicketChat extends Notification
{
    use Queueable;
    private $ticket_chat;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(TicketChat $ticket_chat)
    {
        $this->ticket_chat = $ticket_chat;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
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
            ->subject('New Ticket Message')
            ->line('A new ticket message from '.DB::table('users')->where('id',$this->ticket_chat->user_id)->value('full_name').'.')
            ->action('New Ticket Message ('. DB::table('tickets')->where('id',$this->ticket_chat->ticket_id)->value('tracking_number').')', route('dashboard.tickets.show',$this->ticket_chat->ticket_id))
            ->line('Thank you for using our application!');
    }

    /*public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id'                => $this->ticket_chat->id,
            'user_id'           => $this->ticket_chat->user_id,
            'ticket_id'         => $this->ticket_chat->ticket_id,
            'message'           => $this->ticket_chat->message,
            'files'             => $this->ticket_chat->files,
            'user'              => $notifiable,
        ]);
    }*/

    public function toDatabase($notifiable)
    {
        return [
            'id'                => $this->ticket_chat->id,
            'user_id'           => $this->ticket_chat->user_id,
            'ticket_id'         => $this->ticket_chat->ticket_id,
            'message'           => $this->ticket_chat->message,
            'files'             => $this->ticket_chat->files,
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
