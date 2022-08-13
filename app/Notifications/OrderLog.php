<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderLog extends Notification
{
    use Queueable;
    private $order_log;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(\App\Models\OrderLog $order_log)
    {
        $this->order_log = $order_log;
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
            ->subject('New Order Status')
            ->line('The order of tracking no. ('.$this->order_log->order->tracking_no.') is '.$this->order_log->status)
            ->action('New Order Log ('.$this->order_log->order->tracking_no.')', route("dashboard.order-logs.index",$this->order_log->order_id))
            ->line('Thank you for using our application!');
    }

    /*public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id'                => $this->order_log->id,
            'order_id'          => $this->order_log->order_id,
            'description'       => $this->order_log->description,
            'status'            => $this->order_log->status,
            'notes'             => $this->order_log->notes,
            'user'              => $notifiable,
        ]);
    }*/

    public function toDatabase($notifiable)
    {
        return [
            'id'                => $this->order_log->id,
            'order_id'          => $this->order_log->order_id,
            'hub_id'            => $this->order_log->hub_id,
            'order_tracking_no' => $this->order_log->order->tracking_no,
            'description'       => $this->order_log->description,
            'status'            => $this->order_log->status,
            'notes'             => $this->order_log->notes,
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
