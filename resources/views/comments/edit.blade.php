<x-public-layout title="{{ __('Edit') }}">
    <div class="max-w-lg mx-auto mt-8 p-4 bg-white rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Editar Comentario</h2>

        <form action="{{ route('comments.update', $comment) }}" method="POST">
            @csrf
            @method('PUT')

            <textarea name="content" rows="4" required
                      class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content', $comment->content) }}</textarea>

            <button type="submit"
                    class="mt-3 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Guardar cambios
            </button>
        </form>
    </div>
</x-public-layout>
