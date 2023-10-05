<?php

namespace App\Actions\Medical_Services;

use App\Models\medical_services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DeleteMedical_ServicesAction
{
    public function execute($id): medical_services
    {
        $medical_services = medical_services::find($id);
        $video_path = $medical_services->video_path;
        File::delete(storage_path('app/public/'.$video_path));        
        $medical_services->delete();
        return $medical_services;
    }
}

?>