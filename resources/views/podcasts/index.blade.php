<x-public-layout title="Podcasts">
    <div class="p-8">
        <h1 class="header-1">{{__("Podcasts")}}</h1>

        <div class="flex justify-end gap-4 mb-6">
            @hasrole('superadmin')
            <a href="{{ route('superadmin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                {{ __('Return to dashboard') }}
            </a>
            @elsehasrole('admin')
            <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                {{ __('Return to dashboard') }}
            </a>
            @elsehasrole('teacher')
            <a href="{{ route('teacher.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                {{ __('Return to dashboard') }}
            </a>
            @elsehasrole('student')
            <a href="{{ route('student.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                {{ __('Return to dashboard') }}
            </a>
            @endhasrole

            @can('create', App\Models\Podcast::class)
                <a href="{{ route('podcasts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __('New podcast') }}
                </a>
            @endcan
        </div>

        @if($podcasts->isEmpty())
            <p class="text-gray-600">No podcasts available.</p>
        @else
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach($podcasts as $podcast)
                    <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition duration-300 flex flex-col justify-between">
                        <div class="space-y-2">
                            <h2 class="text-lg font-semibold text-blue-600 hover:underline">
                                <a href="{{ route('podcasts.show', $podcast) }}">{{ $podcast->title }}</a>
                            </h2>
                            <p class="text-sm text-gray-700">{{ Str::limit($podcast->description, 100) }}</p>

                            @if($podcast->image_path)
                                <img src="{{ asset('storage/' . $podcast->image_path) }}" alt="Podcast image" class="w-full h-40 object-cover rounded-md mt-2">
                            @endif
                        </div>

                        <div class="flex items-center justify-between mt-4 text-sm">
                            @can('update', $podcast)
                                <a href="{{ route('podcasts.edit', $podcast) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    {{ __('Edit') }}
                                </a>
                            @endcan

                            @can('delete', $podcast)
                                <form action="{{ route('podcasts.destroy', $podcast) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this podcast?') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $podcasts->links() }}
            </div>
        @endif
    </div>
</x-public-layout>
