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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'post_id' => ['required', 'exists:posts,id'],
            'content' => ['required', 'string', 'min:3', 'max:250', new ForbiddenWords()],
        ];
    }

    public function messages(): array
    {
        return [
            'post_id.required' => 'El ID del post es obligatorio.',
            'post_id.exists' => 'El post no existe.',
            'content.required' => 'El contenido del comentario es obligatorio.',
            'content.min' => 'El comentario debe tener al menos :min caracteres.',
            'content.max' => 'El comentario debe tener maximo :max caracteres.',
        ];
    }
}
