<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|min:5',
            'description' => 'required|string|max:1000',
            'video_path' => $this->isMethod('post')
                ? 'required|file|mimetypes:video/mp4,video/quicktime|max:102400' // 100MB
                : 'nullable|file|mimetypes:video/mp4,video/quicktime|max:102400',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.string' => 'El título debe ser una cadena de texto.',
            'title.max' => 'El título no puede exceder los 255 caracteres.',
            'title.min' => 'El título debe tener al menos 5 caracteres.',
            'description.required' => 'La descripción es obligatoria.',
            'description.string' => 'La descripción debe ser una cadena de texto.',
            'description.max' => 'La descripción no puede exceder los 1000 caracteres.',
            'video_path.required' => 'El archivo de video es obligatorio.',
            'video_path.file' => 'El archivo de video debe ser un archivo válido.',
            'video_path.mimetypes' => 'El video debe ser un archivo MP4 o MOV.',
            'video_path.max' => 'El video no puede exceder los 100MB.',
        ];
    }
}
