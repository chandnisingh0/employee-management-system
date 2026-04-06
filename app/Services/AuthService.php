<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login($credentials)
    {
        if (Auth::attempt($credentials)) {
            return true;
        }
        return false;
    }

    public function logout()
    {
        Auth::logout();
    }
}