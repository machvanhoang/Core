<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'table' => [
                'required',
                'min:1',
                'max:255',
            ],
            'type' => [
                'required',
                'min:1',
                'max:255',
            ],
            'name' => [
                'required',
                'min:1',
                'max:255',
                'unique:tags',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'media_id' => [
                'nullable',
                'integer',
                'min:1',
            ],
        ];
    }
}
