<?php

namespace App\Actions\Admin;

use Illuminate\Support\Facades\Auth;

class LoginAction
{
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
                throw new \InvalidArgumentException('Invalid credentials');
            }
            return redirect()->route('admin.login')->with('error','Invalid credentials');
        }
    }
}

?>