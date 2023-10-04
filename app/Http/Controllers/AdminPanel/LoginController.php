<?php

namespace App\Http\Controllers\AdminPanel;

use App\Actions\Admin\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Traits\ResponseTrait;

class LoginController extends Controller
{
    use ResponseTrait;
    public function login(LoginRequest $request, LoginAction $adminLogin)
    {
        $credentials = $request->only('email', 'password');
        $token = $adminLogin->execute($credentials);
        $Admin = auth('admin')->user();
        $Admin->token = $token;
        return $this->returnData('Data', $Admin);
    }

}

?>