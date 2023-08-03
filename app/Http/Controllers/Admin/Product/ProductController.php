<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductCreateRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private ProductService $productService
    ) {
    }
    public function index()
    {
        $products = $this->productRepository->paginate(10, [], ['id' => 'DESC'], [], []);
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $productStatus = $this->productStatus();
        return view('admin.product.create', compact('productStatus'));
    }
    public function store(ProductCreateRequest $request)
    {
        $data = $request->validated();
        $result = $this->productService->create($data);
        if (isset($result['error'])) {
            return back()->with($result);
        }
        return redirect()->route('admin.product.index')->with($result);
    }
    public function edit(Product $product)
    {
        $productStatus = $this->productStatus();
        return view('admin.product.edit', compact('product', 'productStatus'));
    }
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $result = $this->productService->updated($product, $data);
        return redirect()->route('admin.product.edit', $product)->with($result);
    }
    public function delete(Product $product)
    {
        $result = $this->productService->delete($product);
        return redirect()->route('admin.product.index', $product)->with($result);
    }
    private function productStatus()
    {
        return [];
    }
}
