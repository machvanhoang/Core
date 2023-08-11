<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'title' => [
                'required',
                'min:1',
                'max:254',
            ],
            'address' => [
                'nullable',
            ],
            'email' => [
                'nullable',
            ],
            'hotline' => [
                'nullable',
            ],
            'phone' => [
                'nullable',
            ],
            'zalo' => [
                'nullable',
            ],
            'website' => [
                'nullable',
            ],
            'fanpage' => [
                'nullable',
            ],
            'slogan' => [
                'nullable',
            ],
            'copyright' => [
                'nullable',
            ],
            'google_map' => [
                'nullable',
            ],
            'google_analytics' => [
                'nullable',
            ],
            'google_mastertool' => [
                'nullable',
            ],
            'head_js' => [
                'nullable',
            ],
            'body_js' => [
                'nullable',
            ],
        ];
    }
}
