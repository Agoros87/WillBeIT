<x-public-layout title="{{__('Video details')}}">
    <div class="p-8 max-w-4xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="header-1">{{__('Video details')}}</h1>
            <a href="{{ route('video.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 transition text-sm font-medium">
                {{__('Back')}}
            </a>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow space-y-6">
            @livewire('favorite-button', ['model' => $video])

            <div>
                <h2 class="text-2xl font-semibold text-blue-700">{{ $video->title }}</h2>
                <div class="my-4">
                    <video controls class="w-full rounded border border-gray-300">
                        <source src="{{ asset($video->video_path) }}" type="video/mp4">
                        {{__('Your browser does not support the video reproduction.')}}
                    </video>
                </div>
                <p class="text-sm text-gray-500 mb-2">{{__('Uploaded')}}: {{ $video->created_at->format('d/m/Y') }}</p>
                <p class="text-sm text-gray-500 mb-4">{{__('By')}}: {{ $video->user->name }}</p>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">{{__('Description')}}</h3>
                <p class="text-gray-700">{{ $video->description }}</p>
            </div>
        </div>


        @auth
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ __("Leave a comment") }}</h3>
                <form action="{{ route('comments.store') }}" method="POST" class="space-y-2">
                    @csrf

                    {{-- Campos polimórficos para cualquier modelo --}}
                    <input type="hidden" name="commentable_id" value="{{ $video->id }}">
                    <input type="hidden" name="commentable_type" value="{{ get_class($video) }}">

                    <textarea name="content" rows="4" required
                              class="w-full p-3 border rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                        {{ __("Comment") }}
                    </button>
                </form>
            </div>
        @endauth

        <div class="mt-8">
            <h3 class="text-xl font-semibold mb-4 dark:text-white">{{ __("Commentary") }}</h3>

            @php
                $comments = $video->comments->where('parent_id', null);
            @endphp

            @if($comments->isEmpty())
                <p class="text-sm text-gray-500">{{ __("No Comments Yet") }}</p>
            @else
                <div class="space-y-3">
                    @foreach($comments as $comment)
                        <div class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg shadow-md max-w-lg relative">
                            @include('components.comment', ['comment' => $comment, 'model' => $video])

                            {{-- Botones para editar o eliminar --}}
                            @auth
                                <div class="mt-2 flex space-x-2">
                                    @can('update', $comment)
                                        <a href="{{ route('comments.edit', $comment) }}"
                                           class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                            Editar
                                        </a>
                                    @endcan

                                    @can('delete', $comment)
                                        <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                              onsubmit="return confirm('¿Estás seguro de que deseas eliminar este comentario?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                Eliminar
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            @endauth
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</x-public-layout>
