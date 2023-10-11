<?php

namespace App\Actions\Admin;

use App\Models\admins;
use App\Models\slider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UpdateAdminsAction
{

    public function execute($id,array $data)
    {
        $admin = admins::find($id);
        $data['password'] = bcrypt($data['password']);
        return $admin->update($data);
    }
}

