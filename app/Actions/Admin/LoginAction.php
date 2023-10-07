<?php

namespace App\Actions\Admin;

use App\Http\Traits\ResponseTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class LoginAction
{
    use ResponseTrait;
    public function execute(array $credentials, $isApi = false)
    {
        if (auth('admin')->attempt($credentials)) {
            $token = auth('admin')->attempt($credentials);
            // Check if it's an API request and return the token accordingly
            if ($isApi) {
                return $token;
            }
            // Return the dashboard view in the web context            
            return redirect()->route('admin.dashboard');
        }else{
            if($isApi){
                return $this->returnError('401', 'البيانات خاطئة');
            }
            return redirect()->route('admin.login')->with('error','البيانات خاطئة');
        }
    }
}

?>