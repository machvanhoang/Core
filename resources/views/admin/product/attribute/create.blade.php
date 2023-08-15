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
                        <h4>Attributes news</h4>
                    </div>
                    <form action="{{ route('admin.product.attribute.store', $product) }}" method="POST" role="form"
                        id="attributeStore">
                        <div class="card-body mt-3">
                            <div class="mt-3 mb-3">
                                <label for="attribute_name" class="form-label">Attribute Name</label>
                                <input type="text" class="form-control" id="attribute_name" name="attribute_name"
                                    placeholder="Enter attributes" required />
                            </div>
                            <div class="d-flex justify-content-end align-items-center mt-3">
                                <button type="button" id="btnStore" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Attributes added</h4>
                    </div>
                    <div class="card-body mt-3">
                        <div id="renderViewOptions">
                            @if (!$attributes->isEmpty())
                                <ul>
                                    @foreach ($attributes as $attribute)
                                        <li class="mb-3">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <span>
                                                    {{ $attribute->name }}
                                                </span>
                                                <a class="btn btn-light m-0 ms-2" href="javascript:void(0)">
                                                    <span class="svg"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            class="bi bi-pencil" viewBox="0 0 16 16">
                                                            <path
                                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                            @if (!$attribute->attributeValue->isEmpty())
                                                <ul class="mt-1">
                                                    @foreach ($attribute->attributeValue as $itemValue)
                                                        <li class="mt-2">
                                                            <span>
                                                                {{ $itemValue->attribute_value }}
                                                            </span>
                                                            <a class="btn btn-light m-0 ms-2" href="javascript:void(0)">
                                                                <span class="svg"><svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16" fill="currentColor"
                                                                        class="bi bi-pencil" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
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
                    <form action="{{ route('admin.product.attribute.save_variant', $product) }}" method="POST"
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
                                        @if (!empty($combinations))
                                            @foreach ($combinations as $key => $item)
                                                <tr>
                                                    <td>
                                                        <span>{{ $key + 1 }}</span>
                                                        <input type="hidden"
                                                            name="product_variant[{{ $key }}][listId]"
                                                            value="{{ json_encode($item['listId']) }}">
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)">
                                                            <strong> {{ $item['combination'] }}</strong>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                            name="product_variant[{{ $key }}][sku]"
                                                            class="form-control" placeholder="SP0001" required
                                                            value="SP000{{ $key }}">
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                            name="product_variant[{{ $key }}][regular_price]"
                                                            class="form-control" placeholder="0" required
                                                            value="{{ rand(1, 100000) }}">
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                            name="product_variant[{{ $key }}][sale_price]"
                                                            class="form-control" placeholder="0" required
                                                            value="{{ rand(1, 80000) }}">
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                            name="product_variant[{{ $key }}][inventory]"
                                                            class="form-control" placeholder="1" required
                                                            value="{{ rand(1, 50) }}">
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="btn btn-secondary btn-custom"
                                                                href="javascript:void(0)">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-box-arrow-down" viewBox="0 0 16 16">
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
@endsection
@section('js')
    <script>
        const view = $('#renderViewOptions');
        $('button#btnStore').on('click', async function(e) {
            e.preventDefault();
            const form = $('#attributeStore');
            const response = await $.ajax({
                url: form.attr('action'),
                data: form.serialize(),
                type: 'POST',
                beforeSend: function() {

                },
                success: function(response) {
                    view.html(response.view);
                },
                complete: function() {

                },
                error: function() {

                }
            })
        });
    </script>
@endsection
