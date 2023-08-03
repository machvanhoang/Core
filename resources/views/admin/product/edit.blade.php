@extends('admin.layouts.app')
@section('breadcrumb')
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><span class="text-muted fw-light">Admin/Product</span> Detail</h4>
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">New customer</a>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header custom border-bottom">
                    <h4>Product detail</h4>
                </div>
                <div class="card-body">
                    <div class="mt-3 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name"
                            value="{{ old('name') ?? $product->name }}" id="name" placeholder="">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label font-small">Description</label>
                        <textarea name="description" class="form-control @error('description')is-invalid @enderror" id="description"
                            cols="30" rows="7">{{ old('description') ?? $product->description }}</textarea>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header custom border-bottom">
                    <h4>Media</h4>
                </div>
                <div class="card-body">
                    <div class="mt-3 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name"
                            value="{{ old('name') ?? $product->name }}" id="name" placeholder="">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header custom border-bottom">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="regular_price" class="form-label">Regular price</label>
                            <input type="text" class="form-control @error('regular_price')is-invalid @enderror"
                                name="regular_price" value="{{ old('regular_price') ?? $product->regular_price }}"
                                id="regular_price" placeholder="">
                            @error('regular_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="sale_price" class="form-label">Sale price</label>
                            <input type="text" class="form-control @error('sale_price')is-invalid @enderror"
                                name="sale_price" value="{{ old('sale_price') ?? $product->sale_price }}" id="regular_price"
                                placeholder="">
                            @error('sale_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header custom border-bottom">
                    <h4>Inventory</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="regular_price" class="form-label">Sku</label>
                            <input type="text" class="form-control @error('regular_price')is-invalid @enderror"
                                name="regular_price" value="{{ old('regular_price') ?? $product->regular_price }}"
                                id="regular_price" placeholder="">
                            @error('regular_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="inventory" class="form-label">Inventory</label>
                            <input type="text" class="form-control @error('inventory')is-invalid @enderror"
                                name="inventory" value="{{ old('inventory') ?? $product->inventory }}" id="inventory"
                                placeholder="">
                            @error('inventory')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header custom border-bottom">
                    <h4>Seo</h4>
                </div>
                <div class="card-body">
                    <div class="mt-3 mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title')is-invalid @enderror" name="title"
                            value="" id="title" placeholder="">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="keyword" class="form-label">Keyword</label>
                        <input type="text" class="form-control @error('keyword')is-invalid @enderror" name="keyword"
                            value="" id="keyword" placeholder="">
                        @error('keyword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label font-small">Description</label>
                        <textarea name="description" class="form-control @error('description')is-invalid @enderror" id="description"
                            cols="30" rows="7"></textarea>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header custom">
                    <h4>Status</h4>
                </div>
                <div class="card-body">
                    <div class="mt-0">
                        <select class="form-select @error('status')is-invalid @enderror" name="status"
                            id="customer_status_id">
                            <option value="">Choice status</option>
                            <option value="">Published</option>
                            <option value="">Privated</option>
                            <option value="">Blocked</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header custom">
                    <h4>Slug</h4>
                </div>
                <div class="card-body">
                    <div class="mt-0">
                        <input type="text" class="form-control @error('slug')is-invalid @enderror" name="slug"
                            value="{{ old('slug') ?? $product->slug }}" id="slug" placeholder="">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header custom border-bottom">
                    <h4>Product organization</h4>
                </div>
                <div class="card-body">
                    <div class="mt-3">
                        <label for="slug" class="form-label font-small">Product category</label>
                        <input type="text" class="form-control @error('slug')is-invalid @enderror" name="slug"
                            value="{{ old('slug') ?? $product->slug }}" id="slug" placeholder="">
                    </div>
                    <div class="mt-3">
                        <label for="slug" class="form-label font-small">Product type</label>
                        <input type="text" class="form-control @error('slug')is-invalid @enderror" name="slug"
                            value="" id="slug" placeholder="">
                    </div>
                    <div class="mt-3">
                        <label for="slug" class="form-label font-small">Vendor</label>
                        <input type="text" class="form-control @error('slug')is-invalid @enderror" name="slug"
                            value="" id="slug" placeholder="">
                    </div>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="slug" class="form-label font-small">Tags</label>
                            <a href="#" class="font-small">Cài đặt</a>
                        </div>
                        <input type="text" class="form-control @error('slug')is-invalid @enderror" name="slug"
                            value="" id="slug" placeholder="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
