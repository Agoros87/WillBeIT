<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Videos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('partials.navigation')
<h1>Vídeos</h1>
<a href="{{ route('video.create') }}" style="margin-bottom: 2rem; display: inline-block;">Nuevo Video</a>
@foreach($videos as $video)
    <div class="video-container">
        <h2>{{ $video->title }}</h2>
        <video controls width="100%" style="max-width: 600px;">
            <source src="{{ asset($video->video_path) }}" type="video/mp4">
            Tu navegador no soporta la reproducción de videos.
        </video>
        <p>{{ $video->description }}</p>
        <div class="actions">
            <!-- Ver -->
            <button><a href="{{ route('video.show', $video->id) }}">Ver</a></button>
            <!-- Editar -->
            <button><a href="{{ route('video.edit', $video->id) }}">Editar</a></button>
            <!-- Eliminar -->
            <form action="{{ route('video.destroy', $video->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este video?')">Eliminar
                </button>
            </form>
        </div>
    </div>
@endforeach
</body>
</html>
