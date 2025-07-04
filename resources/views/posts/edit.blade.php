<x-public-layout title="{{__('Edit Post')}}">
    <div class="p-8 max-w-3xl mx-auto bg-white dark:bg-zinc-900 rounded-xl shadow mt-10 text-gray-800 dark:text-gray-200">
        <h1 class="header-1 mb-6">{{ __("Edit Post") }}</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="dark:[&_input]:dark:bg-zinc-800">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="title" class="block text-sm font-medium mb-1">{{ __("Title") }}</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title', $post->title) }}"
                    class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >
                @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="body" class="block text-sm font-medium mb-1">{{ __("Content") }}</label>
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body" class="trix-content border border-gray-300 dark:bg-zinc-800 rounded-md min-h-[200px] focus:ring-2 focus:ring-blue-500 focus:outline-none"></trix-editor>
                @error('body')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <p>{{ __('Tags').': '. $post->tags->pluck('name')->join(', ') }}</p>
                <label for="tags" class="block mb-1 font-semibold"></label>
                <select name="tags[]" id="tags" multiple
                        class="w-full border border-gray-300 rounded-md p-2 bg-white dark:bg-zinc-800 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="image" class="block text-sm font-medium mb-1">{{ __("Image") }}</label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    class="w-full border border-gray-300 rounded-md p-2 bg-white dark:bg-zinc-800 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
                @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="video_id" class="block text-sm font-medium mb-1">{{ __("Video") }}</label>
                <select
                    name="video_id"
                    id="video_id"
                    class="w-full border border-gray-300 rounded-md p-2 bg-white dark:bg-zinc-800 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >
                    @foreach ($videos as $video)
                        <option value="{{ $video->id }}" {{ old('video_id', $post->video_id) == $video->id ? 'selected' : '' }}>
                            {{ $video->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="podcasts_id" class="block text-sm font-medium mb-1">{{ __("Podcast") }}</label>
                <select
                    name="podcasts_id"
                    id="podcasts_id"
                    class="w-full border border-gray-300 rounded-md p-2 bg-white dark:bg-zinc-800 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >
                    @foreach ($podcasts as $podcast)
                        <option value="{{ $podcast->id }}" {{ old('podcasts_id', $post->podcasts_id) == $podcast->id ? 'selected' : '' }}>
                            {{ $podcast->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('posts.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                    {{ __("Cancel") }}
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __("Update") }}
                </button>
            </div>
        </form>
    </div>
</x-public-layout>
