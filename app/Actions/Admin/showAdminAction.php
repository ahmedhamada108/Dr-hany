<?php

namespace App\Actions\Admin;

use App\Models\admins;
use App\Models\slider;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AdminsCollection;

class showAdminAction
{
    use ResponseTrait;
    public function execute($isApi = false)
    {
        $admin = admins::paginate(5);
        if ($isApi) {
            return $this->returnDataPaginated('Data',AdminsCollection::collection($admin));
        }
        return $admins = AdminsCollection::collection($admin);
    }

}
    ?>

