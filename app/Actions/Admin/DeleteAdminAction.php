<?php

namespace App\Actions\Admin;

use App\Models\admins;
use App\Models\slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DeleteAdminAction
{
    public function execute($id): admins
    {
        $admin = admins::find($id);     
        $admin->delete();
        return $admin;
    }
}

?>