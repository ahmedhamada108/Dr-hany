<?php

namespace App\Actions\Slider;

use App\Http\Resources\SliderCollection;
use App\Http\Traits\ResponseTrait;
use App\Models\slider;
use Illuminate\Support\Facades\Auth;

class showSliderAction
{
    use ResponseTrait;
    public function execute()
    {
        $slider = slider::paginate(5);
        return $this->returnDataPaginated('Data',SliderCollection::collection($slider));
    }

}
    ?>

