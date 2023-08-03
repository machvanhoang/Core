<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class ProductService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }
    public function create(array $data = [])
    {
        try {
            $product = $this->productRepository->create($data);
            if (!$product) {
                return [
                    'error' => true,
                    'message' => 'Tạo sản phẩm lỗi.'
                ];
            }
            return [
                'success' => true,
                'message' => 'Tạo sản phẩm thành công.'
            ];
        } catch (\Throwable $th) {
            return [
                'error' => true,
                'message' => 'Không thể tạo sản phẩm.'
            ];
        }
    }
    public function updated(Product $product, array $data = []): array
    {
        try {
            $product->full_name = $data['full_name'];
            $product->username = $data['username'];
            $product->phone = $data['phone'];
            $product->email = $data['email'];
            $product->customer_status_id = $data['customer_status_id'];
            if ($data['password'] && $data['new_password'] && $data['new_confirm_password']) {
                if (!Hash::check($data['password'], $product->password)) {
                    return [
                        'error' => true,
                        'message' => 'Mật khẩu cũ không đúng.'
                    ];
                }
                $product->password = Hash::make($data['new_password']);
            }
            $product->save();
            return [
                'success' => true,
                'message' => 'Cập nhật sản phẩm thành công.'
            ];
        } catch (\Throwable $th) {
            return [
                'error' => false,
                'message' => 'Cập nhật sản phẩm lỗi.'
            ];
        }
    }
    public function delete(Product $product)
    {
        try {
            $product->delete();
            return [
                'success' => true,
                'message' => 'Xóa sản phẩm thành công.'
            ];
        } catch (\Throwable $th) {
            return [
                'error' => false,
                'message' => 'Xóa sản phẩm lỗi vì dữ liệu liên quan.'
            ];
        }
    }
}
