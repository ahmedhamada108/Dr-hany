<?php

namespace App\Actions\ContactUs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Models\website_settings;
use App\Notifications\ContactUsNotification;

class SendContactUsMail
{
    public function execute(Request $request,array $data)
    {
        $data['toAddress'] = website_settings::first()->email;
        $data['fromAddress'] = $data['email'];
        return Notification::route('mail', $data['toAddress'])->notify(new ContactUsNotification($data));
    }
}

?>