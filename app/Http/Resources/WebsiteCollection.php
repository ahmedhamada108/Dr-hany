<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Actions\Awards\showAwardsAction;
use App\Actions\Slider\showSliderAction;
use App\Actions\Gallery\showGalleryAction;
use App\Actions\FeedBack\showFeedBackAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Actions\Medical_Services\showMedical_ServicesAction;
use App\Actions\Specialties_Surgeries\showSpecialties_SurgeriesAction;
use App\Models\awards;
use App\Models\feedback;
use App\Models\gallery;
use App\Models\medical_services;
use App\Models\slider;
use App\Models\Specialties_Surgeries;
use App\Models\website_settings;

class WebsiteCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     */
    

    public function toArray($request)
    {
        $slider_data = slider::all();
        $awards = awards::all();
        $gallery = gallery::all();
        $specialties_surgeries = Specialties_Surgeries::all();
        $medical_services = medical_services::all();
        $feedback = feedback::all();
        $website = new WebsiteSettingsCollection(website_settings::all());
        $websiteSettings = $website->first(); // Assuming you want the first item in the collection

        return [
            'slider' => $slider_data,
            'about_us' => [
                'about_us_part1' => $websiteSettings->about_us_part1,
                'about_us_part2' => $websiteSettings->about_us_part2,
                'image_path' => $websiteSettings->image_path,
                'awards' => $awards,
            ],
            'specilties_surgeries' => $specialties_surgeries,
            'gallery' =>$gallery,
            'medical_services' => $medical_services,
            'statistics' => [
                'patient_number' => $websiteSettings->patient_number,
                'surgeries_number' => $websiteSettings->surgeries_number,
                'visitors_number' => $websiteSettings->visitors_number,
            ],
            'feedback' => $feedback,
            'contact_us'=>[
                'address' => $websiteSettings->address,
                'map_url' => $websiteSettings->map_url,
                'image_path_map' => $websiteSettings->image_path_map,
                'phone' => $websiteSettings->phone,
                'mobile' => $websiteSettings->mobile,
                'email' => $websiteSettings->email,
            ],
            'footer' =>[
                'content_footer' => $websiteSettings->content_footer,
                'terms_of_use' => $websiteSettings->terms_of_use,
                'privacy_policy' => $websiteSettings->privacy_policy,
                'whatsapp' => $websiteSettings->whatsapp,
                'facebook' => $websiteSettings->facebook,
                'linkedin' => $websiteSettings->linkedin,
                'instagram' => $websiteSettings->instagram,
                'tiktok' => $websiteSettings->tiktok,
            ],
        ];

    }
}
