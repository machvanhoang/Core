<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
        $product = $this->route('product');
        return [
            'name' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('product', 'name')->ignore($product)
            ],
            'slug' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('product', 'slug')->ignore($product)
            ],
            'description' => [
                'nullable',
                'min:3',
                'max:255',
            ],
            'content' => [
                'nullable',
                'min:3',
                'max:10000',
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
            ],
            'inventory' => [
                'required',
                'numeric',
                'min:1',
                'max:1000000000',
            ],
            'status' => [
                'required',
                'string'
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
