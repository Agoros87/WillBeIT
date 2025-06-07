<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'center_id' => ['nullable', 'integer'],
            'name' => ['nullable'],
            'surname' => ['nullable'],
            'type' => ['nullable'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'email_verified_at' => ['nullable', 'date'],
            'password' => ['nullable'],
            'remember_token' => ['nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'Este correo ya está registrado en el sistema.',
        ];
    }


    public function authorize(): bool
    {
        return true;
    }
}
