<?php

namespace App\Actions\FeedBack;

use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateFeedBackAction
{
    public function execute(Request $request,array $data): feedback
    {
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images/feedback', 'public');
            $data['image_path'] = $imagePath;
        }
        return feedback::create($data);
    }
}

?>