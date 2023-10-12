<?php

namespace App\Http\Controllers;

use App\Models\website_settings;
use App\Http\Traits\ResponseTrait;
use App\Http\Requests\ContactFormRequest;
use App\Http\Resources\WebsiteCollection;
use App\Actions\ContactUs\SendContactUsMail;
use App\Notifications\ContactUsNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Actions\WebsiteSettings\showWebsiteSettingsAction;



class WebsiteController extends BaseController
{
    use ResponseTrait;
    private $showWebsiteSettingsAction;
    private $SendEmailAction;
    public function __construct(showWebsiteSettingsAction $showWebsiteSettingsAction,SendContactUsMail $SendEmailAction){

        $this->showWebsiteSettingsAction = $showWebsiteSettingsAction;
        $this->SendEmailAction = $SendEmailAction;
    }
    public function index()
    {
        $website = $this->showWebsiteSettingsAction->execute();
        return $this->returnData('Data',new WebsiteCollection(website_settings::all()));
    }
    public function contactUs(ContactFormRequest $contactFormRequest)
    {
        $data = $contactFormRequest->validated();
        $this->SendEmailAction->execute($contactFormRequest,$data);
        return $this->returnSuccessMessage('تم ارسال الرسالة بنجاح');
    }
}
