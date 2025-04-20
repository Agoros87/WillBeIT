<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|min:5',
            'description' => 'required|string|max:1000',
            'video_path' => 'nullable|mimes:mp4|max:100240',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
