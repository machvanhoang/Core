<?php

namespace App\Http\Requests\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerUpdateRequest extends FormRequest
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
        $customer = $this->route('customer');
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
                Rule::unique('customer', 'email')->ignore($customer)
            ],
            'username' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('customer', 'username')->ignore($customer)
            ],
            'password' => [
                'nullable',
                'min:7',
                'max:255'
            ],
            'new_password' => [
                'nullable',
                'min:7',
                'max:255'
            ],
            'new_confirm_password' => [
                'nullable',
                'min:7',
                'max:255',
                'same:new_password'
            ],
            'customer_status_id' => [
                'required',
            ],
        ];
    }
}
