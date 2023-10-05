<?php

namespace App\Actions\Gallery;

use App\Http\Resources\GalleryCollection;
use App\Http\Traits\ResponseTrait;
use App\Models\gallery;
use Illuminate\Support\Facades\Auth;

class showGalleryAction
{
    use ResponseTrait;
    public function execute()
    {
        $gallery = gallery::paginate(5);
        return $this->returnDataPaginated('Data',GalleryCollection::collection($gallery));
    }

}
    ?>

