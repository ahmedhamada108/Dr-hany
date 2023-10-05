<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Medical_ServicesCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'description' => $this->description,
            'video_path' => $this->video_path,
        ];

    }
}
