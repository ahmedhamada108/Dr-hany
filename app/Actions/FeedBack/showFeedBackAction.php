<?php

namespace App\Actions\FeedBack;

use App\Http\Resources\FeedBackCollection;
use App\Http\Traits\ResponseTrait;
use App\Models\feedback;
use Illuminate\Support\Facades\Auth;

class showFeedBackAction
{
    use ResponseTrait;
    public function execute($isApi = false)
    {
        $feedback = feedback::paginate(5);
        if($isApi){
            return $this->returnDataPaginated('Data',FeedBackCollection::collection($feedback));
        }else{
            return $feedback =FeedBackCollection::collection($feedback);
        }
    }

}
    ?>

