<?php

namespace App\Notifications;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdatedTicket extends Notification
{
    use Queueable;
    private $ticket;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
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
            ->subject('Ticket Updated')
            ->line('Ticket with tracking No. ('.$this->ticket->tracking_number.') has been updated.')
            ->action('Ticket Updated ('.$this->ticket->tracking_number.')', route('dashboard.tickets.show',$this->ticket->id))
            ->line('Thank you for using our application!');
    }

    /*public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id'                => $this->ticket->id,
            'user_id'           => $this->ticket->user_id,
            'status'            => $this->ticket->status,
            'tracking_number'   => $this->ticket->tracking_number,
            'ticket_issue_id'   => $this->ticket->ticket_issue_id,
            'subject'           => $this->ticket->subject,
            'description'       => $this->ticket->description,
            'order_id'          => $this->ticket->order_id,
            'user'              => $notifiable,
        ]);
    }*/

    public function toDatabase($notifiable)
    {
        return [
            'id'                => $this->ticket->id,
            'user_id'           => $this->ticket->user_id,
            'status'            => $this->ticket->status,
            'tracking_number'   => $this->ticket->tracking_number,
            'ticket_issue_id'   => $this->ticket->ticket_issue_id,
            'subject'           => $this->ticket->subject,
            'description'       => $this->ticket->description,
            'order_id'          => $this->ticket->order_id,
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
