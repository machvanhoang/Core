@if (!$attributes->isEmpty())
    <ul>
        @foreach ($attributes as $attribute)
            <li class="mb-3">
                <div class="d-flex justify-content-start align-items-center"
                    id="formUpdateAttribute__{{ $attribute->id }}">
                    <span class="attribute_name">
                        {{ $attribute->name }}
                    </span>
                    <div class="formUpdateAttributeValue ms-2 d-none">
                        <div class="d-flex justify-content-start align-items-center">
                            <input type="text" class="form-control" name="name" value="{{ $attribute->name }}"
                                required />
                            <button type="button"
                                data-url="{{ route('admin.product.attribute.update_attribute', ['product' => $product, 'attribute' => $attribute]) }}"
                                class="btn btn-primary ms-2 btnUpdateAttribute"
                                data-element="#formUpdateAttribute__{{ $attribute->id }}">Update</button>
                        </div>
                    </div>
                    <a class="btn btn-light m-0 ms-2 btnAttributeEdit"
                        data-element="#formUpdateAttribute__{{ $attribute->id }}" href="javascript:void(0)">
                        <span class="svg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path
                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                            </svg>
                        </span>
                    </a>
                    <a class="btn btn-light m-0 ms-2 btnAttributeValueAdd"
                        data-element="#formAddAttributeValue__{{ $attribute->id }}"
                        data-attribute_id="{{ $attribute->id }}" href="javascript:void(0)">
                        <span class="svg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-x-square" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span>
                    </a>
                    <div class="d-flex justify-content-start align-items-center ms-2 d-none"
                        id="formAddAttributeValue__{{ $attribute->id }}">
                        <input type="text" class="form-control" name="attribute_value_name"
                            placeholder="Attribute name" required />
                        <button type="button" class="btn btn-primary ms-2 btnAddAttributeValue"
                            data-url="{{ route('admin.product.attribute_value.store', ['product' => $product, 'attribute' => $attribute]) }}"
                            data-element="#formAddAttributeValue__{{ $attribute->id }}">Add</button>
                    </div>
                </div>
                @if (!$attribute->attributeValue->isEmpty())
                    <ul class="mt-1">
                        @foreach ($attribute->attributeValue as $itemValue)
                            <li class="mt-2 d-flex justify-content-start align-items-center"
                                id="formUpdateAttributeValue__{{ $itemValue->id }}">
                                <span class="attribute_value_name">
                                    {{ $itemValue->attribute_value }}
                                </span>
                                <div class="formUpdateAttributeValue ms-2 d-none">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <input type="text" class="form-control" id="attribute_name"
                                            name="attribute_name" value="{{ $itemValue->attribute_value }}" required />
                                        <button type="button"
                                            data-url="{{ route('admin.product.attribute.update_attribute', ['product' => $product, 'attribute' => $attribute]) }}"
                                            class="btn btn-primary ms-2 btnUpdateAttribute"
                                            data-element="#formUpdateAttribute__{{ $attribute->id }}">Update</button>
                                    </div>
                                </div>
                                <a class="btn btn-light m-0 ms-2 btnAttributeEdit"
                                    data-element="#formUpdateAttributeValue__{{ $itemValue->id }}"
                                    href="javascript:void(0)">
                                    <span class="svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path
                                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
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
