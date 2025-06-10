<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'center_name' => 'required|exists:centers,name',
            'name'        => 'required|string',
            'email'       => 'required|email|unique:users,email',
            'type'        => 'nullable|string',
            'password'    => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'email.unique'     => 'El email ya está registrado.',
            'center_name.exists' => 'El centro no existe en la base de datos.',
        ];
    }
}
