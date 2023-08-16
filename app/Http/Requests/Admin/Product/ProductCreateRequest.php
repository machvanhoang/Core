<?php

namespace App\Http\Requests\Admin\Product;

use App\Rules\SalePriceLessThanOrEqualRegularPrice;
use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:255',
                'unique:product',
            ],
            'description' => [
                'nullable',
                'min:3',
                'max:255',
            ],
            'sku' => [
                'required',
                'string',
                'min:1',
                'max:255',
            ],
            'regular_price' => [
                'required',
                'numeric',
                'min:1',
                'max:1000000000',
            ],
            'sale_price' => [
                'required',
                'numeric',
                'min:1',
                'max:1000000000',
                new SalePriceLessThanOrEqualRegularPrice(),
            ],
            'inventory' => [
                'required',
                'numeric',
                'min:1',
                'max:1000000000',
            ],
            'type' => [
                'required',
                'string',
            ],
            'status' => [
                'required',
                'string',
            ],
            'seo_title' => [
                'required',
                'min:3',
                'max:255',
            ],
            'seo_keyword' => [
                'required',
                'min:3',
                'max:255',
            ],
            'seo_description' => [
                'required',
                'min:3',
                'max:255',
            ],
        ];
    }
}
