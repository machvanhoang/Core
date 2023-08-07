<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\MediaController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attributes;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('create', function () {
    return view('create');
});
Route::post('store', function (Request $request) {
    $data = $request->all();
    $product = Product::create($data);
    return redirect()->route('edit', $product);
})->name('store');

Route::get('product/edit/{product}', function (Product $product) {
    $attributes = Attributes::with('attributeValue')->get();
    return view('edit', compact('product', 'attributes'));
})->name('edit');
Route::put('update', function (Request $request) {
    dd($request);
    $data = $request->all();
    $product = Product::create($data);
    return redirect()->route('edit', $product);
})->name('update');



Route::prefix('media')->controller(MediaController::class)->group(function () {
    Route::post('single', 'single')->name('single');
    Route::post('multiple', 'multiple')->name('multiple');
});
