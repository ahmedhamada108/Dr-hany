<?php

namespace App\Actions\Slider;

use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateSliderAction
{
    public function execute(Request $request,array $data): slider
    {
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images/slider', 'public');
            $data['image_path'] = $imagePath;
        }
        return slider::create($data);
    }
}

?>