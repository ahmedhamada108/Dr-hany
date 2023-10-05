<?php

namespace App\Actions\WebsiteSettings;

use App\Http\Resources\WebsiteSettingsCollection;
use App\Http\Traits\ResponseTrait;
use App\Models\website_settings;
use Illuminate\Support\Facades\Auth;

class showWebsiteSettingsAction
{
    use ResponseTrait;
    public function execute()
    {
        $website_settings = website_settings::all();
        return $this->returnData('Data',WebsiteSettingsCollection::collection($website_settings));
    }

}
    ?>

