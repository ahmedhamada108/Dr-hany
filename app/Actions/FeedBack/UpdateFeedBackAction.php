<?php

namespace App\Actions\FeedBack;

use App\Models\feedback;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UpdateFeedBackAction
{

    public function execute($id,array $data): feedback
    {
        $feedback = feedback::find($id);
        $image_path = $feedback->image_path;
        if (isset($data['image_path'])) {
            File::delete(storage_path('app/public/'.$image_path));        
            $imagePath = $data['image_path']->store('images/feedback', 'public');
        }
        $feedback->update($data);
        return $feedback;
    }
}

