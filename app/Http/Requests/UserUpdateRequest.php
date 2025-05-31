<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user->id),
            ],
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
