<?php

namespace App\Notifications;

use App\Models\LandingPageContact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected LandingPageContact $landing_page_contact)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('New Partner Contact Request')
                    ->line('Name: '. $this->landing_page_contact->name)
                    ->line('email: '. $this->landing_page_contact->email)
                    ->line('message: '. $this->landing_page_contact->message)
                    ->action('Check All Partner Contact Requests On Dashboard', config('services.dashboard.url').'/admin/landing-page/contacts')
                    ->line('Thank you');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
