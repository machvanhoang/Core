<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {
    }
    public function loginGet()
    {
        return view('admin.auth.login');
    }
    public function loginPost(AdminLoginRequest $request)
    {
        $data = $request->validated();
        if (!$this->authService->adminLogin($data, ADMIN)) {
            return redirect()->back()->with('error', 'Login error');
        }
        return redirect()->route(ADMIN_INDEX);
    }
    public function logout()
    {
        if (!$this->authService->adminLogout(ADMIN)) {
            return redirect()->back()->with('error', ' Logout errors');
        }
        return redirect()->route(ADMIN_LOGIN_GET);
    }
    public function forgotPassword()
    {
        return view('admin.auth.forgot-password');
    }
    public function registerGet()
    {
        return view('admin.auth.register');
    }
}
