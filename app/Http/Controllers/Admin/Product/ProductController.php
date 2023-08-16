<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductCreateRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Models\Product;
use App\Repositories\ProductMedia\ProductMediaRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private ProductService $productService,
        private ProductMediaRepositoryInterface $productMediaRepository,
    ) {
    }
    public function index(Request $request)
    {
        $products = $this->productRepository->paginate(10, [], ['id' => 'DESC'], [], []);
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        return view('admin.product.create');
    }
    public function store(ProductCreateRequest $request)
    {
        if (!$request->ajax()) {
            return abort(403);
        }
        $data = $request->validated();
        $result = $this->productService->create($data);
        if (isset($result['error'])) {
            return response()->json($result);
        }
        $result['redirect'] = route('admin.product.edit', ['product' => $result['product'], 'type' => $result['product']->type]);
        return response()->json($result);
    }
    public function edit(Product $product)
    {
        $productMedia = $this->productMediaRepository->getAllMediaByProduct($product->id);
        return view('admin.product.edit', compact('product', 'productMedia'));
    }
    public function update(ProductUpdateRequest $request, Product $product)
    {
        if (!$request->ajax()) {
            return abort(403);
        }
        $data = $request->validated();
        $result = $this->productService->updated($product, $data);
        if (isset($result['error'])) {
            return response()->json($result);
        }
        $result['redirect'] = route('admin.product.edit', ['product' => $product, 'type' => $product->type]);
        return response()->json($result);
    }
    public function delete(Product $product)
    {
        $result = $this->productService->delete($product);
        return redirect()->route('admin.product.index', ['type' => $product->type])->with($result);
    }
}
