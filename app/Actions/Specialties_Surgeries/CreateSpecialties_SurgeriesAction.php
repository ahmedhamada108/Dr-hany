<?php

namespace App\Actions\Specialties_Surgeries;

use App\Models\Specialties_Surgeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateSpecialties_SurgeriesAction
{
    public function execute(Request $request,array $data): Specialties_Surgeries
    {
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images/slider', 'public');
            $data['image_path'] = $imagePath;
        }
        return Specialties_Surgeries::create($data);
    }
}

?>