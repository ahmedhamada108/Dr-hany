<?php

namespace App\Actions\Awards;

use App\Models\awards;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UpdateAwardsAction
{

    public function execute($id,array $data): awards
    {
        $awards = awards::find($id);
        $image_path = $awards->image_path;
        if (isset($data['image_path'])) {
            File::delete(storage_path('app/public/'.$image_path));        
            $imagePath = $data['image_path']->store('images/awards', 'public');
            $data['image_path'] = $imagePath;
            $awards->update($data);
            return $awards;
        }else{
            unset($data['image_path']);
            $awards->update($data);
            return $awards;
        }
    }
}

