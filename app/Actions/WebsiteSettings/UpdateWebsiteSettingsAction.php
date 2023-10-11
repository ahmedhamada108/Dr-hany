<?php

namespace App\Actions\WebsiteSettings;

use App\Models\website_settings;
use Illuminate\Support\Facades\File;


class UpdateWebsiteSettingsAction
{

    public function execute(array $data)
    {
        $website_settings = website_settings::find(1);
        $data += [
            'about_us_part1' => nl2br($data['about_us_part1']),
            'about_us_part2' => nl2br($data['about_us_part2']),
            'content_footer' => nl2br($data['content_footer']),
            'terms_of_use' => nl2br($data['terms_of_use']),
            'privacy_policy' => nl2br($data['privacy_policy']),
        ];
        $image_path = $website_settings->image_path;
        if (isset($data['image_path'])) {
            File::delete(storage_path('app/public/'.$image_path));        
            $imagePath = $data['image_path']->store('images/website_settings', 'public');
            $data['image_path'] = $imagePath;
        }else{
            unset($data['image_path']);
        }
        $image_path_map = $website_settings->image_path_map;
        if (isset($data['image_path_map'])) {
            File::delete(storage_path('app/public/'.$image_path_map));        
            $image_path_map = $data['image_path_map']->store('images/website_settings', 'public');
            $data['image_path_map'] = $image_path_map;
        }else{
            unset($data['image_path_map']);
        }
        $website_settings->update($data);
        return $website_settings;
    }
}

