<form action="{{ route('admin.product.attribute.save_variant', $product) }}" method="POST" role="form">
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
                                    <input type="hidden" name="product_variant[{{ $key }}][id]"
                                        value="{{ json_encode($item['listId']) }}">
                                </td>
                                <td>
                                    <a href="javascript:void(0)">
                                        <strong>
                                            {{ $item['combination'] }}
                                        </strong>
                                    </a>
                                </td>
                                <td>
                                    <input type="text" name="product_variant[{{ $key }}][sku]"
                                        class="form-control" placeholder="SP0001" required value="">
                                </td>
                                <td>
                                    <input type="text" name="product_variant[{{ $key }}][regular_price]"
                                        class="form-control" placeholder="0" required value="">
                                </td>
                                <td>
                                    <input type="text" name="product_variant[{{ $key }}][sale_price]"
                                        class="form-control" placeholder="0" required value="">
                                </td>
                                <td>
                                    <input type="text" name="product_variant[{{ $key }}][inventory]"
                                        class="form-control" placeholder="1" required value="">
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary btn-custom" href="javascript:void(0)">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-box-arrow-down"
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
