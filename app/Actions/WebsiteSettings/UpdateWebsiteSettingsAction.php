<?php

namespace App\Actions\WebsiteSettings;

use App\Models\website_settings;

class UpdateWebsiteSettingsAction
{

    public function execute(array $data): website_settings
    {
        $website_settings = website_settings::find(1);
        $website_settings->update($data);
        return $website_settings;
    }
}

