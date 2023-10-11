<?php

namespace App\Actions\Admin;

use App\Models\admins;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateAdminAction
{
    public function execute(Request $request,array $data): admins
    {
        return admins::create($data);
    }
}

?>