<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podcasts</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
@include('partials.navigation')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Podcasts</h1>
    @role('super-superadmin')
        <a href="{{ route('podcasts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 inline-block mb-6">
            Crear nuevo </a>
    @endrole

    @if($podcasts->isEmpty())
        <p class="text-gray-600">No hay podcasts disponibles.</p>
    @else
        <div class="space-y-4">
            @foreach($podcasts as $podcast)
                <div class="border p-4 rounded shadow bg-white">
                    <h2 class="text-xl font-semibold text-blue-600 hover:underline">
                        <a href="{{ route('podcasts.show', $podcast) }}">{{ $podcast->title }}</a>
                    </h2>

                    <p class="text-gray-700 mb-2">{{ Str::limit($podcast->description, 100) }}</p>

                    @if($podcast->image_path)
                        <div class="my-2">
                            <img src="{{ asset('storage/' . $podcast->image_path) }}" alt="Imagen del podcast"
                                 class="w-16 h-16 object-cover rounded">
                        </div>
                    @endif

                    @role('super-superadmin')
                    <div class="flex space-x-2 mt-2">
                        @can('update', $podcast)
                            <a href="{{ route('podcasts.edit', $podcast) }}"
                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                Editar
                            </a>
                        @endcan

                        @can('delete', $podcast)
                            <form action="{{ route('podcasts.destroy', $podcast) }}" method="POST"
                                  onsubmit="return confirm('¿Estás seguro de eliminar este podcast?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                    Eliminar
                                </button>
                            </form>
                        @endcan
                    </div>
                    @endrole
                </div>
            @endforeach


        </div>

        <div class="mt-6">
            {{ $podcasts->links() }}
        </div>
    @endif
</div>
</body>
</html>
