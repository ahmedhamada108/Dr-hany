<?php

namespace App\Actions\Specialties_Surgeries;

use App\Http\Resources\Specialties_SurgeriesCollection;
use App\Http\Traits\ResponseTrait;
use App\Models\Specialties_Surgeries;
use Illuminate\Support\Facades\Auth;

class showSpecialties_SurgeriesAction
{
    use ResponseTrait;
    public function execute()
    {
        $Specialties_Surgeries = Specialties_Surgeries::paginate(5);
        return $this->returnDataPaginated('Data',Specialties_SurgeriesCollection::collection($Specialties_Surgeries));
    }

}
    ?>

