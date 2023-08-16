@extends('admin.layouts.app')
@section('breadcrumb')
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><span class="text-muted fw-light">Admin/Product</span> Create</h4>
        <a href="{{ route('admin.product.create', ['type' => $type]) }}" class="btn btn-primary">New product</a>
    </div>
@endsection
@section('content')
    <form action="#" method="POST" role="form" id="formCreateProduct">
        <input type="hidden" name="type" value="{{ $type }}" />
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Product detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-3 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                id="name" placeholder="">
                            <div class="invalid-feedback feedback_name"></div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label font-small">Description</label>
                            <textarea name="description" class="form-control" id="description" cols="30" rows="7">{{ old('description') }}</textarea>
                            <div class="invalid-feedback feedback_description"></div>
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
                                <input type="text" class="form-control" name="regular_price"
                                    value="{{ old('regular_price') }}" id="regular_price" placeholder="">
                                <div class="invalid-feedback feedback_regular_price"></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="sale_price" class="form-label">Sale price</label>
                                <input type="text" class="form-control" name="sale_price" value="{{ old('sale_price') }}"
                                    id="regular_price" placeholder="">
                                <div class="invalid-feedback feedback_sale_price"></div>
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
                                <input type="text" class="form-control" name="sku" value="{{ old('sku') }}"
                                    id="sku" placeholder="">
                                <div class="invalid-feedback feedback_sku"></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inventory" class="form-label">Inventory</label>
                                <input type="text" class="form-control" name="inventory" value="{{ old('inventory') }}"
                                    id="inventory" placeholder="">
                                <div class="invalid-feedback feedback_inventory"></div>
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
                            <label for="seo_title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}"
                                id="seo_title" placeholder="">
                            <div class="invalid-feedback feedback_seo_title"></div>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="seo_keyword" class="form-label">Keyword</label>
                            <input type="text" class="form-control" name="seo_keyword"
                                value="{{ old('seo_keyword') }}" id="keyword" placeholder="">
                            <div class="invalid-feedback feedback_seo_keyword"></div>
                        </div>
                        <div class="mb-3">
                            <label for="seo_description" class="form-label font-small">Description</label>
                            <textarea name="seo_description" class="form-control" id="seo_description" cols="30" rows="7">{{ old('seo_description') }}</textarea>
                            <div class="invalid-feedback feedback_seo_description"></div>
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
                            <select class="form-select" name="status" id="status">
                                <option value="">Choice status</option>
                                @foreach (STATUS as $status)
                                    <option @selected(old('status') === $status) value="{{ $status }}">{{ $status }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback feedback_status"></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Product organization</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-3">
                            <label for="type" class="form-label font-small">Product type</label>
                            <input type="text" class="form-control" value="{{ $type }}" id="type"
                                placeholder="" readonly>
                        </div>
                        <div class="mt-3">
                            <label for="user_id" class="form-label font-small">Vendor</label>
                            <input type="text" class="form-control" value="{{ auth(ADMIN)->user()->name }}"
                                id="user_id" placeholder="" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-footer">
                        <div class="d-flex justify-content-start">
                            <button type="button" class="btn btn-primary btnSaveProduct"
                                data-action="{{ route('admin.product.store') }}">Create</button>
                            <button type="reset" class="btn btn-secondary ms-3">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('js')
    <script src="{{ asset('assets/admin/js/product/product.js') }}"></script>
@endsection
