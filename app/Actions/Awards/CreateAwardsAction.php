<?php

namespace App\Actions\Awards;

use App\Models\awards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateAwardsAction
{
    public function execute(Request $request,array $data): awards
    {
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images/awards', 'public');
            $data['image_path'] = $imagePath;
        }
        return awards::create($data);
    }
}

?>