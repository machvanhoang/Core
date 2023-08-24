@extends('admin.layouts.app')
@section('breadcrumb')
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold"><span class="text-muted fw-light">Admin/Product</span> Detail</h4>
        <a href="{{ route('admin.product.create', ['type' => $type]) }}" class="btn btn-primary">New product</a>
    </div>
@endsection
@section('content')
    <form action="#" method="POST" role="form" id="formUpdateProduct">
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
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name') ?? $product->name }}" id="name" placeholder="">
                            <div class="invalid-feedback feedback_name"></div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label font-small">Description</label>
                            <textarea name="description" class="form-control" id="description" cols="30" rows="7">{{ old('description') ?? $product->description }}</textarea>
                            <div class="invalid-feedback feedback_description"></div>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label font-small">Content</label>
                            <textarea name="content" class="form-control" id="content" cols="30" rows="12">{{ $product->content }}</textarea>
                            <div class="invalid-feedback feedback_content"></div>
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
                                    value="{{ old('regular_price') ?? $product->regular_price }}" id="regular_price"
                                    placeholder="">
                                <div class="invalid-feedback feedback_regular_price"></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="sale_price" class="form-label">Sale price</label>
                                <input type="text" class="form-control" name="sale_price"
                                    value="{{ old('sale_price') ?? $product->sale_price }}" id="regular_price"
                                    placeholder="">
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
                                <input type="text" class="form-control" name="sku"
                                    value="{{ old('sku') ?? $product->sku }}" id="sku" placeholder="">
                                <div class="invalid-feedback feedback_sku"></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inventory" class="form-label">Inventory</label>
                                <input type="text" class="form-control" name="inventory"
                                    value="{{ old('inventory') ?? $product->inventory }}" id="inventory" placeholder="">
                                <div class="invalid-feedback feedback_inventory"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Variants</h4>
                    </div>
                    <div class="card-body mt-3">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('admin.product.attribute.index', $product) }}"
                                    class="btn btn-warning mt-1">Setting variants</a>
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
                            <input type="text" class="form-control" name="seo_title"
                                value="{{ $product->seo()?->title }}" id="seo_title" placeholder="">
                            <div class="invalid-feedback feedback_seo_title"></div>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="seo_keyword" class="form-label">Keyword</label>
                            <input type="text" class="form-control" name="seo_keyword"
                                value="{{ $product->seo()?->keyword }}" id="seo_keyword" placeholder="">
                            <div class="invalid-feedback feedback_seo_keyword"></div>
                        </div>
                        <div class="mb-3">
                            <label for="seo_description" class="form-label font-small">Description</label>
                            <textarea name="seo_description" class="form-control" id="seo_description" cols="30" rows="7">{{ $product->seo()?->description }}</textarea>
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
                                    <option @selected(old('status') === $status || $product->status === $status) value="{{ $status }}">{{ $status }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback feedback_status"></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header custom">
                        <h4>Slug</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-0">
                            <input type="text" class="form-control" name="slug"
                                value="{{ old('slug') ?? $product->slug }}" id="slug" placeholder="">
                            <div class="invalid-feedback feedback_slug"></div>
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
                                <a href="#" class="font-small" id="managementTags"
                                    data-url="{{ route('admin.tags.all_product', $product) }}">Cài đặt</a>
                            </div>
                            <input type="text" class="form-control"
                                data-url="{{ route('admin.tags.store', $product) }}"
                                data-table="{{ $product->getTable() }}" data-type="{{ $product->type }}" name="tags"
                                id="tags" placeholder="">
                            <div class="invalid-feedback feedback_tag_name"></div>
                            <div class="listTags">
                                @if (!$product->productTags->isEmpty())
                                    @foreach ($product->productTags as $pTag)
                                        <div class="item-tag">
                                            <div class="d-flex justify-content-start align-items-center item-tag__content">
                                                <span>{{ $pTag->tag->name }}</span>
                                                <button class="btnRemoveTags"
                                                    data-url="{{ route('admin.product_tag.delete', $pTag) }}"
                                                    type="button">
                                                    <span class="svg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-x"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                        </svg>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header custom border-bottom">
                        <h4>Avatar</h4>
                    </div>
                    @php
                        $media = app(\App\Repositories\Media\MediaRepositoryInterface::class)->find(old('media_id') ?? $product->media_id);
                    @endphp
                    <div class="card-body">
                        <div class="mt-3 mb-3">
                            <div class="photoUpload-zone">
                                <div class="photoUpload-detail" id="photoUpload-preview">
                                    <img class="rounded" src="{{ $media?->url }}" alt="Alt Photo">
                                </div>
                                <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                    <input type="file" name="file" id="file-zone"
                                        data-element="#photoUpload-preview" data-type="{{ $type }}"
                                        data-url="{{ route('single') }}">
                                    <input type="hidden" name="media_id" value="{{ $media?->id }}" />
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
                            <div class="appendMutipleFiles">
                                @if (!$productMedia->isEmpty())
                                    @foreach ($productMedia as $item)
                                        <div class="file-item" id="deleteMediaItem__{{ $item->media->id }}">
                                            <img src="{{ $item->media->url }}" alt="{{ $item->media->alt }}" />
                                            <input type="hidden" name="media[]" value="{{ $item->media->id }}" />
                                            <button type="button" class="deleteMediaItem"
                                                data-element="#deleteMediaItem__{{ $item->media->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                </svg>
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="photoUpload-zone">
                                <label class="photoUpload-file" id="photo-zone" for="file-zones">
                                    <input type="file" name="files" multiple id="file-zones"
                                        data-element=".appendMutipleFiles" data-type="{{ $type }}"
                                        data-url="{{ route('single') }}">
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
                            <button type="button" class="btn btn-primary btnUpdateProduct"
                                data-action="{{ route('admin.product.update', $product) }}">Update</button>
                            <button type="reset" class="btn btn-secondary ms-3">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" id="modelProductTags" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h5 class="modal-title" id="exampleModalLabel1">Manage tags</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.product_tag.update', $product) }}" method="POST" role="form"
                    id="formProductTagsUpdate">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="d-flex justify-content-start">
                            <input type="text" id="nameBasic" class="form-control"
                                placeholder="Search to find or create tags">
                        </div>
                        <div class="col mt-3">
                            <div class="">Available</div>
                            <div class="renderTagsProduct row">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btnUpdateTags">Update changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/admin/js/product/product.js') }}"></script>
    <script>
        $('#managementTags').on('click', async function(e) {
            e.preventDefault();
            const url = $(this).data('url');
            await $.ajax({
                url: url,
                type: "GET",
                beforeSend: function() {},
                success: function(response) {
                    if (response.success) {
                        const tags = response.tags;
                        const productTags = response.productTags;
                        let html = "";
                        tags.forEach((element, index) => {
                            let checked = "";
                            if (productTags.length) {
                                productTags.forEach((element1, index1) => {
                                    if (element.id === element1.tag_id) {
                                        checked = 'checked';
                                        return true;
                                    }
                                });
                            }
                            html += `<div class="col-md-4">
                                        <div class="form-check form-check-dark">
                                            <input class="form-check-input" name="tagIds[]" ${checked} type="checkbox" value="${element.id}" id="tagProduct__${element.id}">
                                            <label class="form-check-label"   for="tagProduct__${element.id}">${element.name}</label>
                                        </div>
                                    </div>`;
                        });
                        $('.renderTagsProduct').html(html);
                    }
                },
                complete: function() {

                },
                error: function(error) {

                }
            })
            $('#modelProductTags').modal('show');
        });
        $('input#tags').keyup(async function(e) {
            e.preventDefault();
            const _this = $(this);
            if (e.keyCode === 13) {
                const url = _this.data('url');
                const table = _this.data('table');
                const type = _this.data('type');
                const formData = new FormData();
                formData.append('name', _this.val());
                formData.append('table', table);
                formData.append('type', type);
                await $.ajax({
                    url: url,
                    data: formData,
                    type: 'POST',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {},
                    success: function(response) {
                        if (response.success) {
                            const tag = response.tag;
                            $('.listTags').append(`
                                <div class="item-tag">
                                    <div class="d-flex justify-content-start align-items-center item-tag__content">
                                        <span>${tag.name}</span>
                                        <button class="btnRemoveTags" data-url="${response.url}" type="button">
                                            <span class="svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>`);
                            _this.val("");
                            _this.removeClass('is-invalid');
                            $(`.feedback_tag_name`).text("");
                        }
                    },
                    complete: function() {
                        _this.focus();
                    },
                    error: function(error) {
                        let errors = error.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            _this.addClass('is-invalid');
                            $(`.feedback_tag_${field}`).text(messages);
                        });
                    }
                });
            }
        });
        $('body').on('click', '.btnRemoveTags', async function(e) {
            e.preventDefault();
            const _this = $(this);
            const url = _this.data('url');
            const formData = new FormData();
            formData.append('_method', 'DELETE');
            await $.ajax({
                url: url,
                data: formData,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {},
                success: function(response) {
                    if (response.success) {
                        _this.closest('.item-tag').remove();
                    }
                },
                complete: function() {},
                error: function(error) {
                    console.error(error);
                }
            });
        });
        $('body').on('click', '.btnUpdateTags', async function(e) {
            e.preventDefault();
            const _this = $(this);
            const form = $('form#formProductTagsUpdate');
            await $.ajax({
                url: form.attr('action'),
                type: 'POST',
                dataType: "json",
                data: form.serialize(),
                beforeSend: function() {},
                success: function(response) {
                    if (response.success) {
                        const allTags = response.allTags;
                        $('.listTags').html("");
                        if (allTags.length) {
                            allTags.forEach((tag, index) => {
                                $('.listTags').append(`
                                <div class="item-tag">
                                    <div class="d-flex justify-content-start align-items-center item-tag__content">
                                        <span>${tag.tag_id}</span>
                                        <button class="btnRemoveTags" data-url="${tag.tag_id}" type="button">
                                            <span class="svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>`);
                            });
                        }
                    }
                },
                complete: function() {},
                error: function(error) {
                    console.error(error);
                }
            });
        });
    </script>
@endsection
