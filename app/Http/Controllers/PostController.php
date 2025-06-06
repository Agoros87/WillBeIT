<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Podcast;
use App\Models\Post;
use App\Models\Video;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['video', 'podcast', 'user'])->get();
        return view('posts.index', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', [
            'videos' => Video::all(),
            'podcasts' => Podcast::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts');
        }

        $validated['slug'] = Str::slug($validated['title'] . '-' . Str::random(6));
        $validated['user_id'] = Auth::id();
        $post = Post::create($validated);

        event(new PostCreated($post));


        return redirect()->route('posts.index')->with('success', 'Post creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'videos' => Video::all(),
            'podcasts' => Podcast::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        // Si el título ha cambiado, actualizamos el slug
        if ($validated['title'] !== $post->title) {
            $validated['slug'] = Str::slug($validated['title'] . '-' . Str::random(6));
        }

        // Si se sube una nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($post->image && Storage::exists($post->image)) {
                Storage::delete($post->image);
            }

            $validated['image'] = $request->file('image')->store('posts');
        }

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post eliminado correctamente');
    }

    /**
     * Upload image for Trix editor
     */
    public function uploadTrixImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('trix-images', $filename, 'public');
            
            return response()->json([
                'url' => Storage::url($path)
            ]);
        }

        return response()->json(['error' => 'No se pudo subir la imagen'], 400);
    }
}
