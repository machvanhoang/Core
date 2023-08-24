<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
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
    public function update(Product $product, Request $request)
    {
        $tagsIds = $request->tagIds;
        $allTags = $this->productTagsRepository->getByProduct($product->id);
        if (empty($tagsIds)) {
            foreach ($allTags as $key => $tag) {
                $tag->delete();
            }
            return response()->json([
                'success' => true,
                'message' => 'Successs',
            ]);
        }
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
        foreach ($allTags as $key => $tag) {
            if (!in_array($tag->tag_id, $tagsIds)) {
                $tag->delete();
            }
        }
        $allTags = $this->productTagsRepository->getByProduct($product->id);
        return response()->json([
            'success' => true,
            'message' => 'Successs',
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
