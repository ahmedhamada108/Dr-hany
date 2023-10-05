<?php

namespace App\Actions\FeedBack;

use App\Http\Resources\FeedBackCollection;
use App\Http\Traits\ResponseTrait;
use App\Models\feedback;
use Illuminate\Support\Facades\Auth;

class showFeedBackAction
{
    use ResponseTrait;
    public function execute()
    {
        $feedback = feedback::paginate(5);
        return $this->returnDataPaginated('Data',FeedBackCollection::collection($feedback));
    }

}
    ?>

