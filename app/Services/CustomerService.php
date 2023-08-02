<?php

namespace App\Services;

use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    public function __construct(
        private CustomerRepositoryInterface $customerRepository
    ) {
    }
    public function create(array $data = [])
    {
        try {
            $customer = $this->customerRepository->create($data);
            if (!$customer) {
                return [
                    'error' => true,
                    'message' => 'Tạo khách hàng lỗi.'
                ];
            }
            return [
                'success' => true,
                'message' => 'Tạo khách hàng thành công.'
            ];
        } catch (\Throwable $th) {
            return [
                'error' => true,
                'message' => 'Không thể tạo khách hàng.'
            ];
        }
    }
    public function updated(Customer $customer, array $data = []): array
    {
        try {
            $customer->full_name = $data['full_name'];
            $customer->username = $data['username'];
            $customer->phone = $data['phone'];
            $customer->email = $data['email'];
            $customer->customer_status_id = $data['customer_status_id'];
            if ($data['password'] && $data['new_password'] && $data['new_confirm_password']) {
                if (!Hash::check($data['password'], $customer->password)) {
                    return [
                        'error' => true,
                        'message' => 'Mật khẩu cũ không đúng.'
                    ];
                }
                $customer->password = Hash::make($data['new_password']);
            }
            $customer->save();
            return [
                'success' => true,
                'message' => 'Cập nhật khách hàng thành công.'
            ];
        } catch (\Throwable $th) {
            return [
                'error' => false,
                'message' => 'Cập nhật khách hàng lỗi.'
            ];
        }
    }
    public function delete(Customer $customer)
    {
        try {
            $customer->delete();
            return [
                'success' => true,
                'message' => 'Xóa khách hàng thành công.'
            ];
        } catch (\Throwable $th) {
            return [
                'error' => false,
                'message' => 'Xóa khách hàng lỗi vì dữ liệu liên quan.'
            ];
        }
    }
}
