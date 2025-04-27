<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etiquetas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen font-sans">

@include('partials.navigation')

<div class="max-w-6xl mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Gestión de Etiquetas</h1>

        @role('super-superadmin')
        <a href="{{ route('tags.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200">
            + Nueva Etiqueta
        </a>
        @endrole
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 shadow-md" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @forelse($tags as $tag)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $tag->id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 font-semibold">{{ $tag->name }}</td>
                    <td class="px-6 py-4 flex space-x-2">

                        @role('super-superadmin')
                        <a href="{{ route('tags.edit', $tag->id) }}"
                           class="text-yellow-600 hover:text-yellow-800 text-sm font-medium">
                            Editar
                        </a>
                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST"
                              onsubmit="return confirm('¿Estás seguro de eliminar esta etiqueta?')"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:text-red-800 text-sm font-medium">
                                Eliminar
                            </button>
                        </form>
                        @endrole
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">No hay etiquetas registradas.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
