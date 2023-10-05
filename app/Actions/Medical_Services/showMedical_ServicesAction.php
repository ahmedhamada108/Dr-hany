<?php

namespace App\Actions\Medical_Services;

use App\Http\Resources\Medical_ServicesCollection;
use App\Http\Traits\ResponseTrait;
use App\Models\medical_services;
use Illuminate\Support\Facades\Auth;

class showMedical_ServicesAction
{
    use ResponseTrait;
    public function execute()
    {
        $medical_services = medical_services::paginate(5);
        return $this->returnDataPaginated('Data',Medical_ServicesCollection::collection($medical_services));
    }

}
    ?>

