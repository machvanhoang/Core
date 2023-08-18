<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Product;
use App\Repositories\ProductTags\ProductTagsRepositoryInterface;
use App\Repositories\Tag\TagRepositoryInterface;

class TagsController extends Controller
{
    public function __construct(
        private TagRepositoryInterface $tagRepository,
        private ProductTagsRepositoryInterface $productTagsRepository
    ) {
    }
    public function allProduct(Product $product)
    {
        $tags = $this->tagRepository->getByType($product->getTable(), $product->type);
        $productTags = $this->productTagsRepository->getByProduct($product->id);
        return response()->json([
            'success' => true,
            'message' => 'Get all tag with product ID=' . $product->id,
            'tags' => $tags,
            'productTags' => $productTags,
        ]);
    }
    public function store(Product $product, TagRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = str()->slug($data['name']);
        $tag = $this->tagRepository->create($data);
        if (!$tag) {
            return response()->json([
                'success' => false,
                'message' => 'Tạo tag lỗi.',
            ]);
        }
        $productTag = $this->productTagsRepository->create([
            'tag_id' => $tag->id,
            'product_id' => $product->id,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Tạo tag for product thành công.',
            'tag' => $tag,
            'url' => route('admin.product_tag.delete', $productTag),
        ]);
    }
}
