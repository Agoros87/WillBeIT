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
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de la etiqueta es obligatorio.',
            'name.string' => 'El nombre de la etiqueta debe ser una cadena de texto.',
            'name.max' => 'El nombre de la etiqueta no puede exceder los 255 caracteres.',
            'name.min' => 'El nombre de la etiqueta debe tener al menos 3 caracteres.',
        ];
    }
}
