<?php

namespace App\Notifications;

use App\Models\ContactUs;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUsNotification extends Notification
{
    private $contactUs;
    public function __construct($data) {
        $this->contactUs = $data;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)->subject('رسالة من موقعكم')
        ->from($this->contactUs['fromAddress'])
        ->view('Emails.ContactFormMail',[
            'contactUs' => $this->contactUs
        ]);
    }
}
