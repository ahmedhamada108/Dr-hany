<?php

namespace App\Actions\Specialties_Surgeries;

use App\Models\Specialties_Surgeries;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UpdateSpecialties_SurgeriesAction
{

    public function execute($id,array $data): Specialties_Surgeries
    {
        $Specialties_Surgeries = Specialties_Surgeries::find($id);
        $image_path = $Specialties_Surgeries->image_path;
        if (isset($data['image_path'])) {
            File::delete(storage_path('app/public/'.$image_path));        
            $imagePath = $data['image_path']->store('images/Specialties_Surgeries', 'public');
            $data['image_path'] = $imagePath;
            $Specialties_Surgeries->update($data);
            return $Specialties_Surgeries;
        }else{
            unset($data['image_path']);
            $Specialties_Surgeries->update($data);
            return $Specialties_Surgeries;
        }
    }
}

