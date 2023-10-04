<?php

namespace App\Actions\Awards;

use App\Models\awards;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DeleteAwardsAction
{
    public function execute($id): awards
    {
        $slider = awards::find($id);
        $image_path = $slider->image_path;
        File::delete(storage_path('app/public/'.$image_path));        
        $slider->delete();
        return $slider;
    }
}

?>