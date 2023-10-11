<?php

namespace App\Actions\Medical_Services;

use App\Http\Resources\Medical_ServicesCollection;
use App\Http\Traits\ResponseTrait;
use App\Models\medical_services;
use Illuminate\Support\Facades\Auth;

class showMedical_ServicesAction
{
    use ResponseTrait;
    public function execute($isApi = false)
    {
        $medical_services = medical_services::paginate(5);
        if($isApi){
            return $this->returnDataPaginated('Data',Medical_ServicesCollection::collection($medical_services));
        }else{
            return $medical_services =Medical_ServicesCollection::collection($medical_services);
        }
    }

}
    ?>

