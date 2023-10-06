<?php

namespace App\Http\Controllers\AdminPanel;

use App\Actions\Admin\LoginAction;
use Illuminate\Routing\Controller as Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Traits\ResponseTrait;

class LoginController extends Controller
{
    use ResponseTrait;

    public function showLoginForm()
    {
        return view('AdminPanel.login');
    }
    public function login(LoginRequest $request, LoginAction $adminLogin)
    {
        $credentials = $request->only('email', 'password');
        $token = $adminLogin->execute($credentials, $request->is('api/*'));
        if($request->is('api/*')){
            $Admin = auth('admin')->user();
            $Admin->token = $token;
            return $this->returnData('Data', $Admin);
        }
        
        return redirect()->route('admin.dashboard');
    }

}

?>