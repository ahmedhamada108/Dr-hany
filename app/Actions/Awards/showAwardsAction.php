<?php

namespace App\Actions\Awards;

use App\Http\Resources\AwardsCollection;
use App\Http\Traits\ResponseTrait;
use App\Models\awards;
use Illuminate\Support\Facades\Auth;

class showAwardsAction
{
    use ResponseTrait;
    public function execute($isApi = false)
    {
        $awards = awards::paginate(5);
        if($isApi){
            return $this->returnDataPaginated('Data',AwardsCollection::collection($awards));
        }else{
            return $awards =AwardsCollection::collection($awards);
        }
    }

}

?>

