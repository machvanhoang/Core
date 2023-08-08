@extends('admin.layouts.app')
@section('breadcrumb')
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><span class="text-muted fw-light">Admin / Product / Attribute / </span> {{ $product->name }}</h4>
    </div>
@endsection
@section('content')
    <form action="{{ route('admin.product.attribute.store_product', $product) }}" method="POST" role="form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Attributes default</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($attributes as $item)
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="attributes[{{ $item->id }}][id]"
                                    value="{{ $item->id }}" id="attribute__{{ $item->id }}">
                                <label class="form-check-label" for="attribute__{{ $item->id }}">
                                    {{ $item->name }}
                                </label>
                                @if (!$item->attributeValue->isEmpty())
                                    <div class="row">
                                        @foreach ($item->attributeValue as $itemValue)
                                            <div class="col-md-4">
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="attributes[{{ $item->id }}][value][]"
                                                        id="attributeValue__{{ $itemValue->id }}"
                                                        value="{{ $itemValue->id }}">
                                                    <label class="form-check-label"
                                                        for="attributeValue__{{ $itemValue->id }}">
                                                        {{ $itemValue->attribute_value }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Attributes news</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-3 mb-3">
                            <label for="name" class="form-label">Attribute Name</label>
                            <input type="text" class="form-control @error('name')is-invalid @enderror" name="name"
                                value="{{ old('name') }}" id="name" placeholder="">
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
                    <div class="card-header custom border-bottom">
                        <h4>Product detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-3">
                            <label for="status" class="form-label font-small">Status</label>
                            <input type="text" class="form-control" readonly value="{{ $product->status }}"
                                id="status">
                        </div>
                        <div class="mt-3">
                            <label for="slug" class="form-label font-small">Slug</label>
                            <input type="text" class="form-control" readonly value="{{ $product->slug }}"
                                id="slug">
                        </div>
                        <div class="mt-3">
                            <label for="category" class="form-label font-small">Product category</label>
                            <input type="text" class="form-control" name="category" value="{{ $product->slug }}"
                                id="category" readonly>
                        </div>
                        <div class="mt-3">
                            <label for="type" class="form-label font-small">Product type</label>
                            <input type="text" class="form-control" value="{{ $product->type }}" id="type"
                                readonly>
                        </div>
                        <div class="mt-3">
                            <label for="user_id" class="form-label font-small">Vendor</label>
                            <input type="text" class="form-control" value="{{ $product->user?->name }}" id="user_id"
                                readonly>
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
