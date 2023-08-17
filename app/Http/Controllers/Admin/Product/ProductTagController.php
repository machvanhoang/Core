<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductTags;
use App\Repositories\ProductTags\ProductTagsRepositoryInterface;

class ProductTagController extends Controller
{
    public function __construct(
        private ProductTagsRepositoryInterface $productTagsRepository,
    ) {
    }
    public function all(Product $product)
    {

    }
    public function delete(ProductTags $productTag)
    {
        try {
            $productTag->delete();
            return response()->json([
                'success' => true,
                'message' => 'Xóa tag trong product thành công.',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi xóa tag trong product.',
            ]);
        }
    }
}
