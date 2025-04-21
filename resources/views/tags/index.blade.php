<!-- resources/views/tags/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tags</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@include('partials.navigation')
<div class="container mt-5">
    <h1 class="mb-4">Lista de Tags</h1>
    <a href="{{ route('tags.create') }}" class="btn btn-success mb-3">Crear Nuevo Tag</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->created_at->format('d/m/Y') }}</td>
                <td><form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mb-3">Eliminar</button>
                    </form></td>
                <td><a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary mb-3">Editar</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No hay tags disponibles.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
