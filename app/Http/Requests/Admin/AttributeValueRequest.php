<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttributeValueRequest extends FormRequest
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
        $attribute = $this->route("attribute");
        $rules = [
            'attribute_value' => [
                'required',
                'string',
                'min:1',
                'max:255',
            ]
        ];
        if ($this->isMethod('POST')) {
            $rules['attribute_value'][] = Rule::unique('attribute_values', 'attribute_value')->where(function ($query) use ($attribute) {
                $query->where('attribute_id', $attribute->id);
            });
        }
        if ($this->isMethod('PUT')) {
            //$attribute = $this->route('attribute');
            // $rules['name'][] = Rule::unique('attributes', 'name')->ignore($attribute)->where(function ($query) use ($attribute) {
            //     $query->where('product_id', $attribute->id);
            // });
        }
        return $rules;
    }
}
