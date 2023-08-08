<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Attributes\AttributesRepositoryInterface;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function __construct(
        private AttributesRepositoryInterface $attributesRepository
    ) {
    }
    public function product(Product $product)
    {
        $attributes = $this->attributesRepository->getByType();
        return view('admin.product.attribute.create', compact('product', 'attributes'));
    }
    public function storeProduct(Product $product, Request $request){
        dd($request);
    }
}
