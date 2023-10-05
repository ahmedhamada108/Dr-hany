<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedBackCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Patient_Name' => $this->name,
            'Feedback' => $this->feedback,
            'image_path' => $this->image_path,
        ];

    }
}
