<?php

namespace App\Actions\FeedBack;

use App\Models\feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DeleteFeedBackAction
{
    public function execute($id): feedback
    {
        $feedback = feedback::find($id);
        $image_path = $feedback->image_path;
        File::delete(storage_path('app/public/'.$image_path));        
        $feedback->delete();
        return $feedback;
    }
}

?>