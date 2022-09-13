<?php

namespace App\Notifications;

use App\Models\Pickup;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class NewPickupCustomer extends Notification implements ShouldQueue
{
    use Queueable;
    private $pickup;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Pickup $pickup)
    {
        $this->pickup = $pickup;
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
            ->subject('Pickup Created')
            ->line('Your pickup has been created successfully with the tracking no. of ('.$this->pickup->pickup_id.')')
            ->action('Pickup ('.$this->pickup->pickup_id.')', route('dashboard.pickups.show',$this->pickup->id))
            ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'id'                => $this->pickup->id,
            'pickup_id'         => $this->pickup->pickup_id,
            'type'              => $this->pickup->type,
            'scheduled_date'    => $this->pickup->scheduled_date,
            'status'            => $this->pickup->status,
            'notes'             => $this->pickup->notes,
            'contact_id'        => $this->pickup->contact_id,
            'location_id'       => $this->pickup->location_id,
            'business_user_id'  => $this->pickup->business_user_id,
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
