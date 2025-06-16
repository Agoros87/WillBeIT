<?php

namespace App\Http\Requests;

use App\Models\Podcast;
use Illuminate\Foundation\Http\FormRequest;

class PodcastRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Si hay un podcasts en la ruta
        $podcast = $this->route('podcasts');
        return $podcast
            // Es una actualización, solo puede el dueño del podcasts o los teachers, admins y superadmins
            ? $this->user()->can('update', $podcast)
            // Si no hay podcasts, es una creación y pueden los student, teachers, admins y superadmins
            : $this->user()->can('create', Podcast::class);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'audio_file' => $this->isMethod('post') ? 'required|mimes:mp3,wav,ogg|max:100240' : 'nullable|mimes:mp3,wav,ogg|max:100240',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:6048',

        ];
    }
}
