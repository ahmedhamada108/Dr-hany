<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image_path' => $this->image_path,
        ];

    }
}
