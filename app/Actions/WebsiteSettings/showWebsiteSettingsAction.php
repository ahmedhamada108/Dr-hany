<?php

namespace App\Actions\WebsiteSettings;

use App\Http\Resources\WebsiteSettingsCollection;
use App\Http\Traits\ResponseTrait;
use App\Models\website_settings;
use Illuminate\Support\Facades\Auth;

class showWebsiteSettingsAction
{
    use ResponseTrait;
    public function execute($isApi = false)
    {
        $website_settings = website_settings::all();
        if($isApi){
            return $this->returnData('Data',WebsiteSettingsCollection::collection($website_settings));
        }else{
            return $website_settings =WebsiteSettingsCollection::collection($website_settings);
        }
    }

}
    ?>

