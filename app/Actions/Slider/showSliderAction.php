<?php

namespace App\Actions\Slider;

use App\Http\Resources\SliderCollection;
use App\Http\Traits\ResponseTrait;
use App\Models\slider;
use Illuminate\Support\Facades\Auth;

class showSliderAction
{
    use ResponseTrait;
    public function execute($isApi = false)
    {
        $sliders = slider::paginate(5);
        if ($isApi) {
            return $this->returnDataPaginated('Data',SliderCollection::collection($sliders));
        }
        return $sliders = SliderCollection::collection($sliders);
    }

}
    ?>

