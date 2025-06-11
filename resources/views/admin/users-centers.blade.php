<x-layouts.app :title="__('Center Users')">
    <div class="p-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">{{ __('Users from My Center') }}</h1>

        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($users as $user)
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg shadow p-5 hover:shadow-lg transition duration-300 flex flex-col justify-between">
                    <div class="space-y-3">
                        <h3 class="text-xl font-semibold text-blue-600 dark:text-blue-400">
                            <a href="{{ route('users.show', $user) }}" class="hover:underline">
                                {{ $user->name }}
                            </a>
                        </h3>
                    </div>
                    <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                        <p><b>{{ __('Email') }}</b>: {{ $user->email }}</p>
                        <p><b>{{ __('Apellido') }}</b>: {{ $user->surname }}</p>
                        <p><b>{{ __('Center') }}</b>: {{ $user->center->name ?? __('No center assigned') }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $users->links() }}
        </div>
    </div>
</x-layouts.app>
