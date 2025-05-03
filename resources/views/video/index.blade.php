<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Videos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

@include('partials.navigation')

<div class="max-w-6xl mx-auto px-4 py-10">
    @role('superadmin')
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-4xl font-semibold tracking-tight">Vídeos</h1>
        <div class="flex gap-3">
            <a href="{{ route('superadmin.dashboard') }}"
               class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
                Dashboard
            </a>
            <a href="{{ route('video.create') }}"
               class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition text-sm font-medium">
                Nuevo Video
            </a>
        </div>
    </div>
    @endrole

    @if (session('success'))
        <div class="alert-success mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($videos as $video)
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <div class="flex flex-col gap-4">
                    <div>
                        <h2 class="text-lg font-medium">{{ $video->title }}</h2>
                        <p class="text-sm text-gray-500 mb-2">{{ $video->description }}</p>
                        <video controls class="w-full rounded-md border border-gray-200">
                            <source src="{{ asset($video->video_path) }}" type="video/mp4">
                        </video>
                        <p class="text-xs text-gray-400 mt-2">Subido: {{ $video->created_at->format('d/m/Y') }}</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('video.show', $video->id) }}"
                           class="w-24 text-center px-3 py-1.5 text-sm border border-gray-300 rounded-md hover:bg-gray-100 transition">
                            Ver
                        </a>
                        @role('superadmin')
                        <a href="{{ route('video.edit', $video->id) }}"
                           class="w-24 text-center px-3 py-1.5 text-sm border border-blue-300 text-blue-500 rounded-md hover:bg-blue-50 transition">
                            Editar
                        </a>
                        <form action="{{ route('video.destroy', $video->id) }}" method="POST"
                              onsubmit="return confirm('¿Estás seguro de eliminar este video?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-24 text-center px-3 py-1.5 text-sm border border-red-300 text-red-500 rounded-md hover:bg-red-50 transition">
                                Eliminar
                            </button>
                        </form>
                        @endrole
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-10">
        {{ $videos->links() }}
    </div>
</div>

<script>
    setTimeout(() => {
        const alert = document.querySelector('.alert-success');
        if (alert) {
            alert.classList.add('opacity-0');
            setTimeout(() => alert.remove(), 500);
        }
    }, 3000);
</script>

</body>
</html>
