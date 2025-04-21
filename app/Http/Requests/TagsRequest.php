<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|min:3',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
