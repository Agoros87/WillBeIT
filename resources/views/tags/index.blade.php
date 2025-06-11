<x-public-layout :title="__('Tags')">
    <div class="max-w-6xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-800 dark:text-zinc-300">{{ __('Tags management') }}</h1>
            @hasrole('superadmin')
            <div class="flex justify-end gap-4 mb-6">
                <a href="{{ route('superadmin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __('Return to dashboard') }}
                </a>
                <a href="{{ route('tags.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __('New Tag') }}
                </a>
            </div>
            @elsehasrole('admin')
            <div class="flex justify-end gap-4 mb-6">
                <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __('Return to dashboard') }}
                </a>
                <a href="{{ route('tags.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    {{ __('New Tag') }}
                </a>
            </div>
            @endhasrole
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 shadow-md" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">{{ __('ID') }}</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">{{ __('Name') }}</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($tags as $tag)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $tag->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 font-semibold">{{ $tag->name }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            @role('superadmin')
                            <a href="{{ route('tags.edit', $tag->id) }}" class="text-yellow-600 hover:text-yellow-800 text-sm font-medium">
                                {{ __('Edit') }}
                            </a>
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this tag?') }}')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                            @endrole
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">{{ __('No tags registered.') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-public-layout>
