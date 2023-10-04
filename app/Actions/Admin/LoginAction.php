<?php

namespace App\Actions\Admin;

use Illuminate\Support\Facades\Auth;

class LoginAction
{
    public function execute(array $credentials): string
    {
        if (auth('admin')->attempt($credentials)) {
            $token = auth('admin')->attempt($credentials);
            return $token;
        }
        throw new \InvalidArgumentException('Invalid credentials');
    }
}

?>