<?php

namespace App\Actions\Specialties_Surgeries;

use App\Models\Specialties_Surgeries;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DeleteSpecialties_SurgeriesAction
{
    public function execute($id): Specialties_Surgeries
    {
        $Specialties_Surgeries = Specialties_Surgeries::find($id);
        $image_path = $Specialties_Surgeries->image_path;
        File::delete(storage_path('app/public/'.$image_path));        
        $Specialties_Surgeries->delete();
        return $Specialties_Surgeries;
    }
}

?>