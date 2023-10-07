<?php

namespace App\Actions\Slider;

use App\Models\slider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UpdateSliderAction
{

    public function execute($id,array $data)
    {
        
        $slider = slider::find($id);
        $image_path = $slider->image_path;
        if (isset($data['image_path'])) {
            File::delete(storage_path('app/public/'.$image_path));        
            $imagePath = $data['image_path']->store('images/slider', 'public');
            $data['image_path'] = $imagePath;
            // return $data;
            $slider->update($data);
            return $slider;
        }else{
            unset($data['image_path']);
            $slider->update($data);
            return $slider;
        }

    }
}

