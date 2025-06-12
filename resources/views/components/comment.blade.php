<div class="mt-4 p-4 border rounded-lg shadow-md
    @if($comment->parent_id)
        bg-gray-50 dark:bg-gray-900 max-w-xl ml-8 border-l-4 border-blue-500
    @else
        bg-white dark:bg-gray-800 max-w-2xl
    @endif
    ">

    {{-- Información del comentario --}}
    <p class="text-gray-700 dark:text-gray-300">
        <strong>{{ $comment->user->name }}</strong> comentó:
    </p>
    <p class="mt-1 text-gray-900 dark:text-white">
        {{ $comment->content }}
    </p>
    <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>

    {{-- Botones de reacción --}}
    @auth
        <form action="{{ route('comments.reactions.store') }}" method="POST" class="mt-2 flex flex-wrap gap-2">
            @csrf
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
            <button type="submit" name="reaction_type" value="like"
                    class="px-3 py-1 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
                👍 {{ $comment->reactions->where('reaction_type', 'like')->count() }}
            </button>
            <button type="submit" name="reaction_type" value="love"
                    class="px-3 py-1 bg-red-500 text-white rounded-lg shadow hover:bg-red-600">
                ❤️ {{ $comment->reactions->where('reaction_type', 'love')->count() }}
            </button>
            <button type="submit" name="reaction_type" value="laugh"
                    class="px-3 py-1 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600">
                😂 {{ $comment->reactions->where('reaction_type', 'laugh')->count() }}
            </button>
            <button type="submit" name="reaction_type" value="sad"
                    class="px-3 py-1 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600">
                😢 {{ $comment->reactions->where('reaction_type', 'sad')->count() }}
            </button>
            <button type="submit" name="reaction_type" value="angry"
                    class="px-3 py-1 bg-orange-500 text-white rounded-lg shadow hover:bg-orange-600">
                😡 {{ $comment->reactions->where('reaction_type', 'angry')->count() }}
            </button>
        </form>
    @endauth

    {{-- Formulario para responder --}}
    @auth
        <button onclick="toggleReplyForm({{ $comment->id }})"
                class="mt-2 text-blue-500 hover:underline">Responder</button>

        <form id="reply-form-{{ $comment->id }}" action="{{ route('comments.store') }}" method="POST"
              class="mt-2 hidden">
            @csrf
            <input type="hidden" name="commentable_id" value="{{ $model->id }}">
            <input type="hidden" name="commentable_type" value="{{ get_class($model) }}">
            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            <textarea name="content" rows="2" required
                      class="w-full p-2 border rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Escribe tu respuesta..."></textarea>
            <button type="submit"
                    class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
                Responder
            </button>
        </form>
    @endauth

    {{-- Mostrar respuestas (comentarios hijos) --}}
    @if($comment->replies->count() > 0)
        <div class="mt-4 space-y-4">
            @foreach($comment->replies as $reply)
                {{-- Cada comentario hijo se muestra con margen a la izquierda, fondo y borde --}}
                <div class="ml-8 border-l-4 border-blue-400 pl-4 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-sm">
                    @include('components.comment', ['comment' => $reply, 'model' => $model])
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
    function toggleReplyForm(commentId) {
        document.getElementById(`reply-form-${commentId}`).classList.toggle('hidden');
    }
</script>
