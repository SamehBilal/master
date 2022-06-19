<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class NewOrder extends Notification
{
    use Queueable;
    private $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
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
            ->line('A new order from '.DB::table('users')->where('id',$this->order->business_user_id)->value('full_name').'.')
            ->action('New Order ('.$this->order->tracking_no.')', route('dashboard.orders.show',$this->order->id))
            ->line('Thank you for using our application!');
    }

    /*public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id'                => $this->order->id,
            'type'              => $this->order->type,
            'tracking_no'       => $this->order->tracking_no,
            'status'            => $this->order->status,
            'customer_id'       => $this->order->customer_id,
            'pickup_id'         => $this->order->pickup_id,
            'business_user_id'  => $this->order->business_user_id,
            'user'              => $notifiable,
        ]);
    }*/

    public function toDatabase($notifiable)
    {
        return [
            'id'                => $this->order->id,
            'type'              => $this->order->type,
            'tracking_no'       => $this->order->tracking_no,
            'status'            => $this->order->status,
            'customer_id'       => $this->order->customer_id,
            'pickup_id'         => $this->order->pickup_id,
            'business_user_id'  => $this->order->business_user_id,
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
