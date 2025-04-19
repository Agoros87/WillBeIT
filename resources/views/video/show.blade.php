    <div class="container">
        <h1>{{ $video->title }}</h1>
        <video controls width="100%">
            <source src="{{ asset($video->video_path) }}" type="video/mp4">
            Tu navegador no soporta la reproducción de videos.
        </video>
        <p>{{ $video->description }}</p>
        <a href="{{ route('video.index') }}" class="btn btn-secondary">Volver</a>
    </div>
