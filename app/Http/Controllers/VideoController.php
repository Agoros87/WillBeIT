<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->paginate(5);

        return view('video.index', compact('videos'));

    }
    public function create(){

        return view('video.create');
    }

    public function store(VideoRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = 1; // Usuario temporal, en un futuro sera el usuario registrado, tal que asi ($data['user_id'] = auth()->id();)

        if ($request->hasFile('video_path')) {
            $file = $request->file('video_path');
            $extension = $file->extension();
            $fileName = Str::uuid() . '.' . $extension;

            // Guardar en storage/app/public/videos
            $file->storeAs('videos', $fileName, 'public');

            // Ruta para acceso web
            $data['video_path'] = "storage/videos/$fileName";
        }

        Video::create($data);

        return redirect()->route('video.index')->with('success', 'Video creado correctamente');
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('video.show', compact('video'));
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('video.edit', compact('video'));
    }

    public function update(VideoRequest $request, $id)
    {
        $video = Video::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('video_path')) {
            // Eliminar el video anterior
            if ($video->video_path) {
                $oldFilePath = str_replace('storage/', 'public/', $video->video_path);
                Storage::delete($oldFilePath);
            }

            // Subir nuevo video
            $file = $request->file('video_path');
            $extension = $file->extension();
            $fileName = Str::uuid() . '.' . $extension;
            $file->storeAs('videos', $fileName, 'public');
            $data['video_path'] = "storage/videos/$fileName";
        }

        $video->update($data);

        return redirect()->route('video.index')->with('success', 'Video actualizado correctamente');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        // Eliminar el archivo de video
        if ($video->video_path) {
            $filePath = str_replace('storage/', 'public/', $video->video_path);
            Storage::delete($filePath);
        }

        $video->delete();

        return redirect()->route('video.index')->with('success', 'Video eliminado correctamente');
    }
}
