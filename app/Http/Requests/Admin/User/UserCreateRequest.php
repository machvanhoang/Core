<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
                'unique:user',
            ],
            'username' => [
                'required',
                'min:3',
                'max:255',
                'unique:user',
            ],
            'email' => [
                'required',
                'email',
                'unique:user',
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
            'status' => [
                'required',
            ],
        ];
    }
}
