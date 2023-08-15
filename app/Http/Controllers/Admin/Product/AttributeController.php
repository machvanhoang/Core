<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductVariantAttributeRequest;
use App\Models\Attributes;
use App\Models\Product;
use App\Repositories\Attributes\AttributesRepositoryInterface;
use App\Repositories\AttributeValue\AttributeValueRepositoryInterface;
use App\Repositories\ProductVariant\ProductVariantRepositoryInterface;
use App\Services\ProductService;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function __construct(
        private AttributesRepositoryInterface $attributesRepository,
        private AttributeValueRepositoryInterface $attributeValueRepository,
        private ProductService $productService,
        private ProductVariantRepositoryInterface $productVariantRepository,
    ) {
    }
    public function index(Product $product, Attributes $attribute = null)
    {
        $allVariants = $this->productVariantRepository->getVariantByProduct($product->id);
        $attributes = $this->attributesRepository->getAttributeByProduct($product->id);
        // $combinations = $this->productService->getCombinationsByProduct($product->id);
        return view('admin.product.attribute.create', compact('product', 'attributes', 'allVariants', 'attribute'));
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
            'view' => view('admin.product.attribute.added', compact('attributes'))->render(),
        ]);
    }

    public function update(Product $product, Attributes $attribute, Request $request)
    {
        $attribute_name = $request->attribute_name;
        $attribute->name = $attribute_name;
        $attribute->save();
        return redirect()->route('admin.product.attribute.index', ['product' => $product, 'attribute' => $attribute])->with([
            'success' => 'true',
            'message' => 'Thay đổi tên attribute thành công.',
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
