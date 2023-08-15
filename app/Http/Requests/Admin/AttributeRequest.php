<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttributeRequest extends FormRequest
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
        $product = $this->route("product");
        $rules = [
            'name' => [
                'required',
                'string',
                'min:1',
                'max:255',
            ]
        ];
        if ($this->isMethod('POST')) {
            $rules['name'][] = Rule::unique('attributes', 'name')->where(function ($query) use ($product) {
                $query->where('product_id', $product->id);
            });
        }
        if ($this->isMethod('PUT')) {
            $attribute = $this->route('attribute');
            $rules['name'][] = Rule::unique('attributes', 'name')->ignore($attribute)->where(function ($query) use ($product) {
                $query->where('product_id', $product->id);
            });
        }
        return $rules;
    }
}
