<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Traits\SeoTrait;

class ProductService
{
    use SeoTrait;
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
            $this->createSeo($product, $data);
            return [
                'success' => true,
                'product' => $product,
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
            $product->update($data);
            $this->createSeo($product, $data);
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
            $newProduct = $product;
            $product->delete();
            $this->deleteSeo($newProduct);
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
