<x-public-layout title="{{ __('Create Post') }}">
    <div class="p-8 max-w-3xl mx-auto bg-white dark:bg-zinc-900 rounded-xl shadow mt-10 text-gray-700 dark:text-gray-200">

        <h1 class="header-1 mb-6">{{ __('Create Post') }}</h1>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <label for="title" class="block text-sm font-medium mb-1">{{ __('Title') }}</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    class="w-full border dark:bg-zinc-800 border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >
                @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="body" class="block text-sm font-medium mb-1">{{ __('Content') }}</label>
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body" class="trix-content border rounded min-h-[200px] dark:bg-zinc-800"></trix-editor>
                @error('body')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="tags" class="block text-sm font-medium mb-1">{{ __('Tags') }}</label>
                <select name="tags[]" id="tags" multiple class="w-full border border-gray-300 rounded-md p-2 mb-4 bg-white dark:bg-zinc-800 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="mb-5">
                <label for="image" class="block text-sm font-medium mb-1">{{ __('Image') }}</label>
                <input
                    type="file"
                    id="image"
                    name="image"
                    class="w-full border border-gray-300 rounded-md p-2 bg-white dark:bg-zinc-800 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
                @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="video_id" class="block text-sm font-medium mb-1">{{ __('Video') }}</label>
                <select
                    id="video_id"
                    name="video_id"
                    class="w-full border border-gray-300 rounded-md p-2 bg-white dark:bg-zinc-800 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >
                    @foreach ($videos as $video)
                        <option value="{{ $video->id }}" {{ old('video_id') == $video->id ? 'selected' : '' }}>
                            {{ $video->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="podcasts_id" class="block text-sm font-medium mb-1">{{ __('Podcast') }}</label>
                <select
                    id="podcasts_id"
                    name="podcasts_id"
                    class="w-full border border-gray-300 rounded-md p-2 bg-white dark:bg-zinc-800 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >
                    @foreach ($podcasts as $podcast)
                        <option value="{{ $podcast->id }}" {{ old('podcasts_id') == $podcast->id ? 'selected' : '' }}>
                            {{ $podcast->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('posts.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                    {{ __('Cancel') }}
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __('Create') }}
                </button>
            </div>
        </form>
    </div>
</x-public-layout>
