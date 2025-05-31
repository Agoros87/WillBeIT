<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'center_id' => ['required', 'integer'],
            'name' => ['required'],
            'surname' => ['nullable'],
            'type' => ['nullable'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'email_verified_at' => ['nullable', 'date'],
            'password' => ['required'],
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
