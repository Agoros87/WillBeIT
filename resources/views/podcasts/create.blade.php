<x-public-layout title="{{__('Create Podcast')}}">
    <div class="p-8 max-w-3xl mx-auto bg-white dark:bg-zinc-900 rounded-xl shadow mt-10">

        <h1 class="header-1 mb-6">{{__("Create New Podcast")}}</h1>

        <form action="{{ route('podcasts.store') }}" method="POST" enctype="multipart/form-data" class="dark:[&_*]:text-gray-200">
            @csrf

            <div class="mb-5">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">{{__("Title")}}</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >
                @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">{{__("Description")}}</label>
                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="audio_file" class="block text-sm font-medium text-gray-700 text-gray-200 mb-1">{{__("Audio File")}}</label>
                <input
                    type="file"
                    id="audio_file"
                    name="audio_file"
                    class="w-full border border-gray-300 dark:bg-zinc-800 rounded-md p-2 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >
                @error('audio_file')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">{{__("Image (optional)")}}</label>
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

            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('podcasts.index') }}" class="bg-gray-300 dark:bg-gray-700 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                    {{__("Cancel")}}
                </a>
                <button type="submit" class="bg-blue-600 dark:bg-emerald-700 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:hover:bg-emerald-500  transition">
                    {{__("Create")}}
                </button>
            </div>
        </form>
    </div>
</x-public-layout>
