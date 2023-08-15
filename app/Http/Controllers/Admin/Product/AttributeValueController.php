<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttributeValueRequest;
use App\Models\Attributes;
use App\Models\Product;
use App\Repositories\Attributes\AttributesRepositoryInterface;
use App\Repositories\AttributeValue\AttributeValueRepositoryInterface;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    public function __construct(
        private AttributeValueRepositoryInterface $attributeValueRepository,
        private AttributesRepositoryInterface $attributesRepository
    ) {
    }
    public function store(Product $product, Attributes $attribute, AttributeValueRequest $request)
    {
        $data = $request->validated();
        $created = $this->attributeValueRepository->create([
            'attribute_id' => $attribute->id,
            'attribute_value' => $data['attribute_value'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if (!$created) {
            return response()->json([
                'success' => false,
                'message' => 'Tạo attribute value lỗi.',
            ]);
        }
        $attributes = $this->attributesRepository->getAttributeByProduct($product->id);
        return response()->json([
            'success' => true,
            'message' => 'Tạo attribute thành công.',
            'view' => view('admin.product.attribute.added', compact('attributes', 'product'))->render(),
        ]);
    }
}
