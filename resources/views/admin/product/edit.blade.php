@extends('admin.layouts.app')
@section('breadcrumb')
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><span class="text-muted fw-light">Admin/Product</span> Detail</h4>
        <a href="{{ route('admin.product.create', ['type' => $type]) }}" class="btn btn-primary">New product</a>
    </div>
@endsection
@section('content')
    <form action="{{ route('admin.product.update', $product) }}" method="POST" role="form">
        @csrf
        @method('PUT')
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
                        <div class="mb-3">
                            <label for="content" class="form-label font-small">Content</label>
                            <textarea name="content" class="form-control @error('content')is-invalid @enderror" id="content" cols="30"
                                rows="12">{{ $product->content }}</textarea>
                            @error('content')
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
                                    name="sale_price" value="{{ old('sale_price') ?? $product->sale_price }}"
                                    id="regular_price" placeholder="">
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
                                <label for="sku" class="form-label">Sku</label>
                                <input type="text" class="form-control @error('sku')is-invalid @enderror" name="sku"
                                    value="{{ old('sku') ?? $product->sku }}" id="sku" placeholder="">
                                @error('sku')
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
                        <h4>Variants</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Seo</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-3 mb-3">
                            <label for="seo_title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('seo_title')is-invalid @enderror"
                                name="seo_title" value="{{ $product->seo()?->title }}" id="seo_title" placeholder="">
                            @error('seo_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="seo_keyword" class="form-label">Keyword</label>
                            <input type="text" class="form-control @error('seo_keyword')is-invalid @enderror"
                                name="seo_keyword" value="{{ $product->seo()?->keyword }}" id="seo_keyword"
                                placeholder="">
                            @error('seo_keyword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="seo_description" class="form-label font-small">Description</label>
                            <textarea name="seo_description" class="form-control @error('seo_description')is-invalid @enderror"
                                id="seo_description" cols="30" rows="7">{{ $product->seo()?->description }}</textarea>
                            @error('seo_description')
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
                                id="status">
                                <option value="">Choice status</option>
                                @foreach (STATUS as $status)
                                    <option @selected(old('status') === $status || $product->status === $status) value="{{ $status }}">{{ $status }}
                                    </option>
                                @endforeach
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
                            <label for="category" class="form-label font-small">Product category</label>
                            <input type="text" class="form-control @error('category')is-invalid @enderror"
                                name="category" value="{{ old('category') ?? $product->slug }}" id="category"
                                placeholder="">
                        </div>
                        <div class="mt-3">
                            <label for="type" class="form-label font-small">Product type</label>
                            <input type="text" class="form-control" value="{{ $product->type }}" id="type"
                                placeholder="" readonly>
                        </div>
                        <div class="mt-3">
                            <label for="user_id" class="form-label font-small">Vendor</label>
                            <input type="text" class="form-control" value="{{ $product->user?->name }}"
                                id="user_id" placeholder="" readonly>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="tags" class="form-label font-small">Tags</label>
                                <a href="#" class="font-small">Cài đặt</a>
                            </div>
                            <input type="text" class="form-control @error('tags')is-invalid @enderror" name="tags"
                                value="" id="tags" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Avatar</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-3 mb-3">
                            <div class="photoUpload-zone">
                                <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                    <input type="file" name="file" id="file-zone">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                    <p class="photoUpload-or">hoặc</p>
                                    <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                                </label>
                                <div class="photoUpload-dimension">Width: 300 px - Height: 200 px
                                    (.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Gallery</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-3 mb-3">
                            <div class="photoUpload-zone">
                                <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                    <input type="file" name="file" multiple id="file-zone">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                    <p class="photoUpload-or">hoặc</p>
                                    <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                                </label>
                                <div class="photoUpload-dimension">Width: 300 px - Height: 200 px
                                    (.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-footer">
                        <div class="d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-secondary ms-3">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
