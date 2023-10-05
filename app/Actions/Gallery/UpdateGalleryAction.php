<?php

namespace App\Actions\Gallery;

use App\Models\gallery;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UpdateGalleryAction
{

    public function execute($id,array $data): gallery
    {
        $gallery = gallery::find($id);
        $image_path = $gallery->image_path;
        if (isset($data['image_path'])) {
            File::delete(storage_path('app/public/'.$image_path));        
            $imagePath = $data['image_path']->store('images/gallery', 'public');
        }
        $gallery->update($data);
        return $gallery;
    }
}

