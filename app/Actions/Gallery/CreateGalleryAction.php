<?php

namespace App\Actions\Gallery;

use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateGalleryAction
{
    public function execute(Request $request,array $data): gallery
    {
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images/gallery', 'public');
            $data['image_path'] = $imagePath;
        }
        return gallery::create($data);
    }
}

?>