<?php

namespace App\Actions\Medical_Services;

use App\Models\medical_services;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UpdateMedical_ServicesAction
{

    public function execute($id,array $data): medical_services
    {
        $medical_services = medical_services::find($id);
        $video_path = $medical_services->video_path;
        if (isset($data['video_path'])) {
            File::delete(storage_path('app/public/'.$video_path));        
            $VideoPath = $data['video_path']->store('videos/medical_services', 'public');
        }
        $medical_services->update($data);
        return $medical_services;
    }
}

