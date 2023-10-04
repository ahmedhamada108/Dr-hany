<?php

namespace App\Actions\Slider;

use App\Models\slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DeleteSliderAction
{
    public function execute($id): slider
    {
        $slider = slider::find($id);
        $image_path = $slider->image_path;
        File::delete(storage_path('app/public/'.$image_path));        
        $slider->delete();
        return $slider;
    }
}

?>