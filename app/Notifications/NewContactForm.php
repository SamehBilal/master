<?php

namespace App\Notifications;

use App\Models\ContactForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactForm extends Notification implements ShouldQueue
{
    use Queueable;
    private $contactForm;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ContactForm $contactForm)
    {
        $this->contactForm = $contactForm;
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
            ->subject('New Contact Form')
            ->line('A new contact form from '.$this->contactForm->name.'.')
            ->action('New Contact Form', route('dashboard.contact-forms.show',$this->contactForm->id))
            ->line('Thank you for using our application!');
    }

    /*public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id'                => $this->contactForm->id,
            'name'              => $this->contactForm->name,
            'email'             => $this->contactForm->email,
            'message'           => $this->contactForm->message,
            'user'              => $notifiable,
        ]);
    }*/

    public function toDatabase($notifiable)
    {
        return [
            'id'                => $this->contactForm->id,
            'name'              => $this->contactForm->name,
            'email'             => $this->contactForm->email,
            'message'           => $this->contactForm->message,
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
