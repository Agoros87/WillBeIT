<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CenterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|numeric|max_digits:10',
            'email' => 'required|email|max:255',
            'director_email' => 'required|email|max:255',
            'director_name' => 'required|string|max:255',
            'erasmus_coordinator' => 'required|string|max:255',
            'phone' => 'required|numeric|max_digits:20',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
