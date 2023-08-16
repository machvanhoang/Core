@extends('admin.layouts.app')
@section('breadcrumb')
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><span class="text-muted fw-light">Admin / Product / Attribute / </span> {{ $product->name }}</h4>
    </div>
@endsection
@section('content')
    <div id="pageAttribute">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Attributes news
                        </h4>
                    </div>
                    <div id="attributeStore">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Attribute Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder=""
                                    required />
                                <div class="invalid-feedback invalid-feedback_name"></div>
                            </div>
                            <div class="d-flex justify-content-end align-items-center mt-3">
                                <button type="button" data-action="{{ route('admin.product.attribute.store', $product) }}"
                                    id="btnStore" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Attributes added</h4>
                    </div>
                    <div class="card-body mt-3">
                        <div id="renderAttributeAdded">
                            @include('admin.product.attribute.added')
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
                            <input type="text" class="form-control" readonly value="{{ $product->slug }}" id="slug">
                        </div>
                        <div class="mt-3">
                            <label for="category" class="form-label font-small">Product category</label>
                            <input type="text" class="form-control" name="category" value="{{ $product->slug }}"
                                id="category" readonly>
                        </div>
                        <div class="mt-3">
                            <label for="type" class="form-label font-small">Product type</label>
                            <input type="text" class="form-control" value="{{ $product->type }}" id="type" readonly>
                        </div>
                        <div class="mt-3">
                            <label for="user_id" class="form-label font-small">Vendor</label>
                            <input type="text" class="form-control" value="{{ $product->user?->name }}" id="user_id"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Product variants</h4>
                    </div>
                    <div id="renderProductVariants">
                        <form action="{{ route('admin.product.attribute.update_variant', $product) }}" method="POST"
                            role="form">
                            @csrf
                            <div class="card-body mt-3">
                                <div id="renderViewOptions">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#No</th>
                                                <th>Name</th>
                                                <th>Sku</th>
                                                <th>Regular price</th>
                                                <th>Sale price</th>
                                                <th>Inventory</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0" style="border-top: 0">
                                            @if (!$allVariants->isEmpty())
                                                @foreach ($allVariants as $key => $variant)
                                                    <tr>
                                                        <td>
                                                            <span>{{ $key + 1 }}</span>
                                                            <input type="hidden"
                                                                name="product_variant[{{ $key }}][id]"
                                                                value="{{ $variant->id }}">
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <strong>
                                                                    @foreach ($variant->attributeValues as $item)
                                                                        {{ $item->attribute_value }}
                                                                        @if (!$loop->last)
                                                                            /
                                                                        @endif
                                                                    @endforeach
                                                                </strong>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                name="product_variant[{{ $key }}][sku]"
                                                                class="form-control" placeholder="SP0001" required
                                                                value="{{ $variant->sku }}">
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                name="product_variant[{{ $key }}][regular_price]"
                                                                class="form-control" placeholder="0" required
                                                                value="{{ $variant->regular_price }}">
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                name="product_variant[{{ $key }}][sale_price]"
                                                                class="form-control" placeholder="0" required
                                                                value="{{ $variant->sale_price }}">
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                name="product_variant[{{ $key }}][inventory]"
                                                                class="form-control" placeholder="1" required
                                                                value="{{ $variant->inventory }}">
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class="btn btn-secondary btn-custom"
                                                                    href="javascript:void(0)">
                                                                    <span>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor"
                                                                            class="bi bi-box-arrow-down"
                                                                            viewBox="0 0 16 16">
                                                                            <path fill-rule="evenodd"
                                                                                d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z" />
                                                                            <path fill-rule="evenodd"
                                                                                d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z" />
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer border-top">
                                <div class="d-flex justify-content-start">
                                    <button type="submit" class="btn btn-primary">Save all</button>
                                    <button type="reset" class="btn btn-secondary ms-3">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const view = $('#renderAttributeAdded');
        const viewVariant = $('#renderProductVariants');
        $('button#btnStore').on('click', async function(e) {
            e.preventDefault();
            const parent = $('#attributeStore');
            const input = parent.find('input[name="name"]');
            const inputFeedback = parent.find('.invalid-feedback_name');
            const action = $(this).data('action');
            const formData = new FormData();
            formData.append('name', input.val());
            const response = await $.ajax({
                url: action,
                data: formData,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    input.removeClass('is-invalid');
                },
                success: function(response) {
                    input.val("");
                    view.html(response.view);
                    viewVariant.html(response.combinations);
                },
                complete: function() {},
                error: function(error) {
                    let errors = error.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        input.addClass('is-invalid');
                        inputFeedback.text(messages);
                    });
                }
            })
        });
        $('body').on('click', '.btnUpdateAttribute', async function(e) {
            e.preventDefault();
            const url = $(this).data('url');
            const formData = new FormData();
            const element = $($(this).data('element'));
            const label_name = $($(this).data('label_name'));
            const input = element.find('input[name="name"]');
            formData.append('name', input.val());
            formData.append('_method', 'PUT');
            const response = await $.ajax({
                url: url,
                data: formData,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    input.removeClass('is-invalid');
                    input.removeClass('is-valid');
                },
                success: function(response) {
                    input.addClass('is-valid');
                    label_name.text(response.attributes.name);
                },
                complete: function() {},
                error: function(error) {
                    let errors = error.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        input.addClass('is-invalid');
                    });
                }
            });
        });
        $('body').on('click', '.btnAttributeValueAdd', function(e) {
            e.preventDefault();
            $(this).toggleClass('active');
            const element = $($(this).data('element'));
            element.toggleClass('d-none');
        });
        $('body').on('click', '.btnAddAttributeValue', async function(e) {
            e.preventDefault();
            const element = $($(this).data('element'));
            const input = element.find('input[name="attribute_value_name"]');
            const url = $(this).data('url');
            const formData = new FormData();
            formData.append('attribute_value', input.val());
            const response = await $.ajax({
                url: url,
                data: formData,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    input.removeClass('is-invalid');
                    input.removeClass('is-valid');
                },
                success: function(response) {
                    view.html(response.view);
                    viewVariant.html(response.combinations);
                },
                complete: function() {},
                error: function(error) {
                    let errors = error.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        input.addClass('is-invalid');
                    });
                }
            });
        });
        $('body').on('click', '.btnAttributeShowAttributeValue', function(e) {
            e.preventDefault();
            const element = $($(this).data('element'));
            const listElement = $($(this).data('list_element'));
            element.toggleClass('d-none');
            listElement.toggleClass('d-none');
        });
        $('body').on('click', '.btnUpdateAttributeValue', async function(e) {
            e.preventDefault();
            const element = $($(this).data('element'));
            const url = $(this).data('url');
            const input = element.find('input[name="attribute_value"]')
            const formData = new FormData();
            formData.append('_method', 'PUT');
            formData.append('attribute_value', input.val());
            const response = await $.ajax({
                url: url,
                data: formData,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    input.removeClass('is-invalid');
                    input.removeClass('is-valid');
                },
                success: function(response) {
                    input.addClass('is-valid');
                },
                complete: function() {},
                error: function(error) {
                    let errors = error.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        input.addClass('is-invalid');
                    });
                }
            });
        });
    </script>
@endsection
