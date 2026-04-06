<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($this->authService->login($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('login');
    }
}