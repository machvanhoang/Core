<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductTags;
use App\Repositories\ProductTags\ProductTagsRepositoryInterface;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    public function __construct(
        private ProductTagsRepositoryInterface $productTagsRepository,
    ) {
    }
    public function all(Product $product)
    {

    }
    public function update(Product $product, Request $request)
    {
        $tagsIds = $request->tagIds;
        if (empty($tagsIds)) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể thực hiện',
            ]);
        }
        $allTags = $this->productTagsRepository->getByProduct($product->id);
        foreach ($tagsIds as $key => $tag) {
            $productTag = $this->productTagsRepository->findOneBy([
                'product_id' => $product->id,
                'tag_id' => $tag,
            ]);
            if (!$productTag) {
                $this->productTagsRepository->create([
                    'product_id' => $product->id,
                    'tag_id' => $tag,
                ]);
            }
        }
        $allTags = $this->productTagsRepository->getByProduct($product->id);
        $this->productTagsRepository->deleteProductTags($product->id, $tagsIds);
        return response()->json([
            'success' => true,
            'message' => 'Thành công',
            'tagsIds' => $tagsIds,
            'allTags' => $allTags,
        ]);
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
