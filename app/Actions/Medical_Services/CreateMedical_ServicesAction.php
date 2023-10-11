<?php

namespace App\Actions\Medical_Services;

use App\Models\medical_services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateMedical_ServicesAction
{
    public function execute(Request $request,array $data)
    {
        if ($request->hasFile('video_path')) {
            $VideoPath = $request->file('video_path')->store('videos/medical_services', 'public');
            $data['video_path'] = $VideoPath;
        }
        return medical_services::create($data);
    }
}

?>