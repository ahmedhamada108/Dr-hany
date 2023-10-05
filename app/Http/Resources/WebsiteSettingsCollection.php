<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WebsiteSettingsCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slogan' => $this->slogan,
            'about_us_part1' => $this->about_us_part1,
            'about_us_part2' => $this->about_us_part2,
            'patient_number' => $this->patient_number,
            'surgeries_number' => $this->surgeries_number,
            'visitors_number' => $this->visitors_number,
            'address' => $this->address,
            'map_url' => $this->map_url,
            'image_path_map' => $this->image_path_map,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'content_footer' => $this->content_footer,
            'terms_of_use' => $this->terms_of_use,
            'privacy_policy' => $this->privacy_policy,
            'whatsapp' => $this->whatsapp,
            'facebook' => $this->facebook,
            'linkedin' => $this->linkedin,
            'instagram' => $this->instagram,
            'tiktok' => $this->tiktok,

        ];

    }
}
