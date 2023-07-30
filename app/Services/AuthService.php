<?php

namespace App\Services;

use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private CustomerRepositoryInterface $customerRepository
    ) {
    }
    public function adminLogin(array $data, string $guard = null)
    {
        if (is_null($guard))
            return false;
        if (!Auth::guard($guard)->attempt(['username' => $data['username'], 'password' => $data['password']], isset($data['remember']) ?: false)) {
            return false;
        }
        return true;
    }
    public function adminLogout(string $guard = null)
    {
        try {
            Auth::guard($guard)->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return true;
        } catch (\Exception $e) {
            Log::error($e);
            return false;
        }
    }
}
