<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AwardsCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray($request)
    {
        $isApiRequest = $request->expectsJson();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'image_path' => asset('storage/' . $this->image_path),
        ];

    }
}
