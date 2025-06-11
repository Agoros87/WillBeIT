<?php

namespace App\Http\Requests;

use App\Rules\ForbiddenWords;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Solo usuarios autenticados pueden comentar
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'commentable_id' => ['integer'],
            'commentable_type' => ['string'],
            'content' => ['required', 'string', 'min:3', 'max:250', new ForbiddenWords()],
        ];
    }

    public function messages(): array
    {
        return [
            'commentable_id' => ['required', 'integer'],
            'commentable_type' => ['required', 'string'],
            'content.required' => 'El contenido del comentario es obligatorio.',
            'content.min' => 'El comentario debe tener al menos :min caracteres.',
            'content.max' => 'El comentario debe tener maximo :max caracteres.',
        ];
    }
}
