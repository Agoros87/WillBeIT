<?php

namespace App\Http\Controllers;

use App\Http\Requests\PodcastRequest;
use App\Models\Podcast;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PodcastController extends Controller
{
    public function index()
    {
        $podcasts = Podcast::latest()->paginate(10);
        return view('podcasts.index', compact('podcasts'));
    }

    public function create()
    {
        return view('podcasts.create');
    }

    public function store(PodcastRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('audio_file')) {
            $validated['podcast_path'] = $request->file('audio_file')->store('podcasts/audio', 'public');
        }

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('podcasts/images', 'public');
        }

        $podcast = auth()->user()->podcasts()->make($validated);
        $podcast['slug'] = Str::slug($podcast ['title'].'-'.Str::random(6));
        $podcast->save();

        return to_route('podcasts.index')->with('success', 'Podcast creado correctamente.');
    }

    public function show(Podcast $podcast)
    {
        return view('podcasts.show', compact('podcast'));
    }

    public function edit(Podcast $podcast)
    {
        return view('podcasts.edit', compact('podcast'));
    }

    public function update(PodcastRequest $request, Podcast $podcast)
    {
        $validated = $request->validated();

        // Si el título cambia, actualizo el slug
        if ($validated['title'] !== $podcast->title) {
            $validated['slug'] = Str::slug($validated['title'].'-'.Str::random(6));
        }

        if ($request->hasFile('audio_file')) {
            // Eliminar el archivo anterior
            if ($podcast->podcast_path && Storage::disk('public')->exists($podcast->podcast_path)) {
                Storage::disk('public')->delete($podcast->podcast_path);
            }
            $validated['podcast_path'] = $request->file('audio_file')->store('podcasts/audio', 'public');
        }

        // Subir la imagen si se proporciona
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior
            if ($podcast->image_path && Storage::disk('public')->exists($podcast->image_path)) {
                Storage::disk('public')->delete($podcast->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('podcasts/images', 'public');
        }

        $podcast->update($validated);

        return to_route('podcasts.index')->with('success', 'Podcast actualizado correctamente.');
    }

    public function destroy(Podcast $podcast)
    {
        if ($podcast->podcast_path && Storage::disk('public')->exists($podcast->podcast_path)) {
            Storage::disk('public')->delete($podcast->podcast_path);
        }
        if ($podcast->image_path && Storage::disk('public')->exists($podcast->image_path)) {
            Storage::disk('public')->delete($podcast->image_path);
        }

        $podcast->delete();
        return to_route('podcasts.index')->with('success', 'Podcast eliminado.');
    }

}
