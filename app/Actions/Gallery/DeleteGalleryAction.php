<?php

namespace App\Actions\Gallery;

use App\Models\gallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DeleteGalleryAction
{
    public function execute($id): gallery
    {
        $gallery = gallery::find($id);
        $image_path = $gallery->image_path;
        File::delete(storage_path('app/public/'.$image_path));        
        $gallery->delete();
        return $gallery;
    }
}

?>