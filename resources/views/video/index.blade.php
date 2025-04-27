<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Videos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

@include('partials.navigation')

<div class="max-w-5xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold">Videos</h1>
        @role('super-superadmin')
        <a href="{{ route('video.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            + Nuevo Video
        </a>
        @endrole
    </div>

    @if (session('success'))
        <div
            class="alert-success mb-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-md transition-opacity duration-500"
        >
            {{ session('success') }}
        </div>
    @endif

    <div class="grid gap-6">
        @foreach($videos as $video)
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-2">{{ $video->title }}</h2>
                <div class="mb-4">
                    <video controls class="w-full max-w-2xl rounded-lg">
                        <source src="{{ asset($video->video_path) }}" type="video/mp4">
                    </video>
                </div>
                <p class="text-gray-700 mb-4">{{ $video->description }}</p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('video.show', $video->id) }}"
                       class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition">
                        Ver
                    </a>
                    @role('super-superadmin')
                    <a href="{{ route('video.edit', $video->id) }}"
                       class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                        Editar
                    </a>
                    <form action="{{ route('video.destroy', $video->id) }}" method="POST"
                          onsubmit="return confirm('¿Estás seguro de eliminar este video?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                            Eliminar
                        </button>
                    </form>
                    @endrole
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
