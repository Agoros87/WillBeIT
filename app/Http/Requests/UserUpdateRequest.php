<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'type' => 'nullable|string|max:255',
            'center_id' => 'required|exists:centers,id',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
            'password' => 'nullable|string|min:2',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
