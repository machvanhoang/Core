<?php

namespace App\Http\Requests\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateRequest extends FormRequest
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
            'full_name' => [
                'required',
                'min:3',
                'max:255',
            ],
            'phone' => [
                'required',
                'min:9',
                'max:11',
            ],
            'email' => [
                'required',
                'email',
                'unique:customer',
            ],
            'username' => [
                'required',
                'min:3',
                'max:255',
                'unique:customer',
            ],
            'password' => [
                'required',
                'min:7',
                'max:255'
            ],
            'confirm_password' => [
                'required',
                'min:7',
                'max:255',
                'same:password'
            ],
            'customer_status_id' => [
                'required',
            ],
        ];
    }
}
