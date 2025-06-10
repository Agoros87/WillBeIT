<x-public-layout title="Podcasts">
    <div class="p-8">
        <h1 class="header-1">Podcasts</h1>

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
            @can('create',App\Models\Podcast::class)
                <a href="{{ route('video.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __('New video') }}
                </a>
            @endcan
        </div>

        @if($podcasts->isEmpty())
            <p class="text-gray-600">No podcasts available.</p>
        @else
            <div class="space-y-4">
                @foreach($podcasts as $podcast)
                    <div class="border p-4 rounded shadow bg-white">
                        <h2 class="text-xl font-semibold text-blue-600 hover:underline">
                            <a href="{{ route('podcasts.show', $podcast) }}">{{ $podcast->title }}</a>
                        </h2>
                        <p class="text-gray-700 mb-2">{{ Str::limit($podcast->description, 100) }}</p>
                        @if($podcast->image_path)
                            <div class="my-2">
                                <img src="{{ asset('storage/' . $podcast->image_path) }}" alt="Podcast image" class="w-16 h-16 object-cover rounded">
                            </div>
                        @endif

                        <div class="flex space-x-2 mt-2">
                            @can('update', $podcast)
                                <a href="{{ route('podcasts.edit', $podcast) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                    Edit
                                </a>
                            @endcan

                            @can('delete', $podcast)
                                <form action="{{ route('podcasts.destroy', $podcast) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this podcast?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                        Delete
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
