<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Repositories\ProductTags\ProductTagsRepositoryInterface;
use App\Repositories\Tag\TagRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Product;

class TagsController extends Controller
{
    public function __construct(
        private TagRepositoryInterface $tagRepository,
        private ProductTagsRepositoryInterface $productTagsRepository
    ) {
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
            'product_id' => $product->id
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Tạo tag for product thành công.',
            'tag' => $tag,
            'url' => route('admin.product_tag.delete', $productTag),
        ]);
    }
}
