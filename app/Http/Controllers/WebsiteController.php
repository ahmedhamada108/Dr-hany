<?php

namespace App\Http\Controllers;

use App\Actions\WebsiteSettings\showWebsiteSettingsAction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Resources\WebsiteCollection;
use App\Http\Traits\ResponseTrait;
use App\Models\website_settings;
use Illuminate\Routing\Controller as BaseController;

class WebsiteController extends BaseController
{
    use ResponseTrait;
    private $showWebsiteSettingsAction;
    public function __construct(showWebsiteSettingsAction $showWebsiteSettingsAction){

        $this->showWebsiteSettingsAction = $showWebsiteSettingsAction;
    }
    public function index()
    {
        $website = $this->showWebsiteSettingsAction->execute();
        return $this->returnData('Data',new WebsiteCollection(website_settings::all()));
    }
}
