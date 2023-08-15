<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductVariantAttributeRequest;
use App\Models\Product;
use App\Repositories\Attributes\AttributesRepositoryInterface;
use App\Repositories\AttributeValue\AttributeValueRepositoryInterface;
use App\Repositories\VariantAttributeValues\VariantAttributeValuesRepositoryInterface;
use App\Services\ProductService;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function __construct(
        private AttributesRepositoryInterface $attributesRepository,
        private AttributeValueRepositoryInterface $attributeValueRepository,
        private ProductService $productService,
        private VariantAttributeValuesRepositoryInterface $variantAttributeValuesRepository
    ) {
    }
    public function product(Product $product)
    {
        $allVariants = $this->variantAttributeValuesRepository->getProductVariantByProduct($product->id);
        $attributes = $this->attributesRepository->getAttributeByProduct($product->id);
        $combinations = $this->productService->getCombinationsByProduct($product->id);
        return view('admin.product.attribute.create', compact('product', 'attributes', 'allVariants', 'combinations'));
    }
    public function store(Product $product, Request $request)
    {
        $data = $request->all();
        $this->attributesRepository->create([
            'name' => $data['attribute_name'],
            'product_id' => $product->id,
        ]);
        $attributes = $this->attributesRepository->getAttributeByProduct($product->id);
        return response()->json([
            'success' => true,
            'view' => view('admin.product.attribute.option', compact('attributes'))->render(),
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
        return redirect()->route('admin.product.attribute.product', $product)->with($result);
    }

    private function byData($attributes)
    {
        $combinedPairs = [];
        foreach ($attributes as $key => $attribute) {
            $attributeId = $attribute->id;
            $combinedPairs[$attributeId][] = $attribute;
        }
        return $combinedPairs;
    }
}
