<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttributeRequest;
use App\Http\Requests\Admin\Product\ProductVariantAttributeRequest;
use App\Models\Attributes;
use App\Models\Product;
use App\Repositories\Attributes\AttributesRepositoryInterface;
use App\Repositories\AttributeValue\AttributeValueRepositoryInterface;
use App\Repositories\ProductVariant\ProductVariantRepositoryInterface;
use App\Services\ProductService;

class AttributeController extends Controller
{
    public function __construct(
        private AttributesRepositoryInterface $attributesRepository,
        private AttributeValueRepositoryInterface $attributeValueRepository,
        private ProductService $productService,
        private ProductVariantRepositoryInterface $productVariantRepository,
    ) {
    }
    public function indexAttribute(Product $product, Attributes $attribute = null)
    {
        $allVariants = $this->productVariantRepository->getVariantByProduct($product->id);
        $attributes = $this->attributesRepository->getAttributeByProduct($product->id);
        $combinations = $this->productService->getCombinationsByProduct($product->id);
        return view('admin.product.attribute.index', compact('product', 'attributes', 'allVariants', 'attribute', 'combinations'));
    }
    public function storeAttribute(Product $product, AttributeRequest $request)
    {
        $data = $request->validated();
        $this->attributesRepository->create([
            'name' => $data['name'],
            'product_id' => $product->id,
        ]);
        $attributes = $this->attributesRepository->getAttributeByProduct($product->id);
        $combinations = $this->productService->getCombinationsByProduct($product->id);
        return response()->json([
            'success' => true,
            'message' => 'Tạo attribute thành công',
            'view' => view('admin.product.attribute.added', compact('attributes', 'product'))->render(),
            'combinations' => view('admin.product.variant.create', compact('combinations', 'product'))->render(),
        ]);
    }

    public function updateAttribute(Product $product, Attributes $attribute, AttributeRequest $request)
    {
        $data = $request->validated();
        $attribute->name = $data['name'];
        $attribute->save();
        return response()->json([
            'success' => true,
            'message' => 'Update attribute thành công.',
            'attributes' => $attribute,
        ]);
    }
    public function allAttribute(Product $product)
    {
        $attributes = $this->attributesRepository->getAttributeByProduct($product->id);
        return response()->json([
            'success' => true,
            'attributes' => $attributes,
        ]);
    }
    public function saveVariant(Product $product, ProductVariantAttributeRequest $request)
    {
        $data = $request->validated();
        $result = $this->productService->saveProductVariant($product, $data);
        return redirect()->route('admin.product.attribute.index', $product)->with($result);
    }

    public function updateVariant(Product $product, ProductVariantAttributeRequest $request)
    {
        $data = $request->validated();
        $result = $this->productService->updateProductVariant($product, $data);
        return redirect()->route('admin.product.attribute.index', $product)->with($result);
    }
}
