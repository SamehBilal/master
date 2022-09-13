<?php

namespace App\Notifications;

use App\Models\Business;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class NewBusiness extends Notification implements ShouldQueue
{
    use Queueable;
    private $business;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Business $business)
    {
        $this->business = $business;
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
            ->subject('New Business')
            ->line('A new business from '.DB::table('users')->where('id',$this->business->business_user_id)->value('full_name').'.')
            ->action('New Business', route('dashboard.businesses.show',$this->business->id))
            ->line('Thank you for using our application!');
    }

    /*public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id'                => $this->business->id,
            'ar_name'           => $this->business->ar_name,
            'en_name'           => $this->business->en_name,
            'sales_channel'     => $this->business->sales_channel,
            'store_url'         => $this->business->store_url,
            'industry'          => $this->business->industry,
            'location_id'       => $this->business->location_id,
            'business_user_id'  => $this->business->business_user_id,
            'user'              => $notifiable,
        ]);
    }*/

    public function toDatabase($notifiable)
    {
        return [
            'id'                => $this->business->id,
            'ar_name'           => $this->business->ar_name,
            'en_name'           => $this->business->en_name,
            'sales_channel'     => $this->business->sales_channel,
            'store_url'         => $this->business->store_url,
            'industry'          => $this->business->industry,
            'location_id'       => $this->business->location_id,
            'business_user_id'  => $this->business->business_user_id,
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
