<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|min:5',
            'description' => 'required|string|max:1000', //Para evitar textos muy largos sur pares!
            'video_path' => $this->isMethod('post') ? 'required|mimes:mp4|max:100240' : 'nullable|mimes:mp4|max:100240', // Máx 100MB
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
