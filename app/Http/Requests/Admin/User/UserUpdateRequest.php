<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
        $user = $this->route('user');
        return [
            'name' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('user', 'name')->ignore($user)
            ],
            'username' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('user', 'username')->ignore($user)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('user', 'email')->ignore($user)
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
            'status' => [
                'required',
            ],
        ];
    }
}
