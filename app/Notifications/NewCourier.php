<?php

namespace App\Notifications;

use App\Models\CourierLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class NewCourier extends Notification implements ShouldQueue
{
    use Queueable;
    private $log;
    private $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(CourierLog $log)
    {
        $this->log = $log;
        $this->url = '';
        if($this->log->order_id != ''){
            $this->url = route('dashboard.orders.show',$log->order_id);
        }else{
            $this->url = route('dashboard.pickups.show',$log->pickup_id);
        }
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
            ->subject('New Order')
            ->line('A new order/pickup has been assigned to you.')
            ->action('New Order', $this->url)
            ->line('Thank you for using our application!');
    }


    public function toDatabase($notifiable)
    {
        return [
            'id'                => $this->log->id,
            'order_id'          => $this->log->order_id,
            'pickup_id'         => $this->log->pickup_id,
            'courier_id'        => $this->log->courier_id,
            'url'               => $this->url,
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
