@if (!$attributes->isEmpty())
    <ul>
        @foreach ($attributes as $attribute)
            <li class="mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-start align-items-center">
                        <span class="attribute_name" id="attribute_name__{{ $attribute->id }}">
                            {{ $attribute->name }}
                        </span>
                        <div class="d-flex justify-content-start align-items-center ms-2 d-none"
                            id="formAddAttributeValue__{{ $attribute->id }}">
                            <input type="text" class="form-control" name="attribute_value_name"
                                placeholder="Attribute name" required />
                            <button type="button" class="btn btn-primary ms-2 btnAddAttributeValue"
                                data-url="{{ route('admin.product.attribute_value.store', ['product' => $product, 'attribute' => $attribute]) }}"
                                data-element="#formAddAttributeValue__{{ $attribute->id }}">Add</button>
                        </div>
                        <a class="btn btn-light m-0 ms-2 btnAttributeValueAdd"
                            data-element="#formAddAttributeValue__{{ $attribute->id }}"
                            data-attribute_id="{{ $attribute->id }}" href="javascript:void(0)">
                            <span class="svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    <a class="btn btn-light m-0 ms-2 btnAttributeShowAttributeValue"
                        data-element="#listEditAttributeValue__{{ $attribute->id }}"
                        data-list_element="#listLabelAttributeValue__{{ $attribute->id }}" href="javascript:void(0)">
                        <span class="svg">
                            Edit
                        </span>
                    </a>
                </div>
                @if (!$attribute->attributeValue->isEmpty())
                    <div class="listLabelAttributeValue mt-2" id="listLabelAttributeValue__{{ $attribute->id }}">
                        @foreach ($attribute->attributeValue as $itemValue)
                            <span class="badge badge-secondary fw-normal">{{ $itemValue->attribute_value }}</span>
                        @endforeach
                    </div>
                @endif
                <ul class="p-0 mt-1 d-none listEditAttributeValue" id="listEditAttributeValue__{{ $attribute->id }}">
                    <li class="mt-2 d-flex justify-content-start align-items-center">
                        <div id="formUpdateAttribute__{{ $attribute->id }}">
                            <div class="title_attribute_name mb-1">Options name</div>
                            <div class="formUpdateAttributeValue mb-2">
                                <div class="d-flex justify-content-start align-items-center">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $attribute->name }}" required />
                                    <button type="button"
                                        data-url="{{ route('admin.product.attribute.update_attribute', ['product' => $product, 'attribute' => $attribute]) }}"
                                        class="btn btn-primary ms-2 btnUpdateAttribute"
                                        data-label_name="#attribute_name__{{ $attribute->id }}"
                                        data-element="#formUpdateAttribute__{{ $attribute->id }}">Update</button>
                                </div>
                            </div>
                            <div class="title_attribute_value_name mb-1">Options value</div>
                        </div>
                    </li>
                    @if (!$attribute->attributeValue->isEmpty())
                        @foreach ($attribute->attributeValue as $itemValue)
                            <li class="mt-2 d-flex justify-content-start align-items-center">
                                <div class="formUpdateAttributeValue"
                                    id="formUpdateAttributeValue__{{ $itemValue->id }}">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <input type="text" class="form-control" name="attribute_value"
                                            value="{{ $itemValue->attribute_value }}" required />
                                        <button type="button"
                                            data-url="{{ route('admin.product.attribute_value.update', ['product' => $product, 'attribute' => $attribute, 'attributeValue' => $itemValue]) }}"
                                            class="btn btn-primary ms-2 btnUpdateAttributeValue"
                                            data-element="#formUpdateAttributeValue__{{ $itemValue->id }}">Update</button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>
        @endforeach
    </ul>
@endif
