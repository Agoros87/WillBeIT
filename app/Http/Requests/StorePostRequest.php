<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'video_id' => 'required|exists:videos,id',
            'podcasts_id' => 'required|exists:podcasts,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:25555',
            'image' => 'nullable|image|max:20480',
        ];
    }
}
