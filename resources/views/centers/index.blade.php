<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centers</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
@include('partials.navigation')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-4">{{ __('Centers') }}</h1>
    @hasrole('superadmin')
    <div class="flex items-center justify-between mb-8">
        <div class="flex gap-3">
            <a href="{{ route('superadmin.dashboard') }}"
               class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
                Dashboard
            </a>
            <a href="{{ route('centers.create') }}"
               class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition text-sm font-medium">
                Nuevo Centro
            </a>
        </div>
    </div>
    @elsehasrole('admin')
    <div class="flex items-center justify-between mb-8">
        <div class="flex gap-3">
            <a href="{{ route('admin.dashboard') }}"
               class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
                Dashboard
            </a>
        </div>
    </div>
    @endhasrole

    @if($centers->isEmpty())
        <p class="text-gray-600">No hay centros disponibles.</p>
    @else
        <div class="flex flex-row flex-wrap *:flex-2/5 gap-6">
            @foreach($centers as $center)
                <div class="border p-4 rounded shadow bg-white">
                    <h2 class="text-xl font-semibold text-blue-600 hover:underline">
                        <a href="{{ route('centers.show', $center) }}">{{ $center->name }}</a>
                    </h2>
                    <p class="text-gray-700 mb-2">{{ $center->email }}</p>
                    <p class="text-gray-700 mb-2">{{ $center->phone }}</p>
                    <div class="flex space-x-2">
                        @can('update', $center)
                            <a href="{{ route('centers.edit', $center) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                Editar </a>
                        @endcan

                        @can('delete', $center)
                            <form action="{{ route('centers.destroy', $center) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este centro?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                    Eliminar
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach

        </div>
    @endif
</div>
</body>
</html>
