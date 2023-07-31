<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {
    }
    public function create(array $data = [])
    {
        try {
            $user = $this->userRepository->create($data);
            if (!$user) {
                return [
                    'error' => true,
                    'message' => 'Tạo tài khoản lỗi.'
                ];
            }
            return [
                'success' => true,
                'message' => 'Tạo tài khoản thành công.'
            ];
        } catch (\Throwable $th) {
            return [
                'error' => true,
                'message' => 'Không thể tạo tài khoản.'
            ];
        }
    }
    public function updated(User $user, array $data = []): array
    {
        try {
            $user->name = $data['name'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->status = $data['status'];
            if ($data['password'] && $data['new_password'] && $data['new_confirm_password']) {
                if (!Hash::check($data['password'], $user->password)) {
                    return [
                        'error' => true,
                        'message' => 'Mật khẩu cũ không đúng.'
                    ];
                }
                $user->password = Hash::make($data['new_password']);
            }
            $user->save();
            return [
                'success' => true,
                'message' => 'Cập nhật tài khoản thành công.'
            ];
        } catch (\Throwable $th) {
            return [
                'error' => false,
                'message' => 'Cập nhật tài khoản lỗi.'
            ];
        }
    }
    public function delete(User $user)
    {
        try {
            $user->delete();
            return [
                'success' => true,
                'message' => 'Xóa tài khoản thành công.'
            ];
        } catch (\Throwable $th) {
            return [
                'error' => false,
                'message' => 'Xóa tài khoản lỗi.'
            ];
        }
    }
}
