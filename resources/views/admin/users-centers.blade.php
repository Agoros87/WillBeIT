<x-layouts.app :title="__('Center Users')">
    <div class="p-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">{{ __('Users from My Center') }}</h1>

        <div class="flex flex-col gap-6">
            @foreach ($users as $user)
                <div class="bg-white dark:bg-neutral-900 rounded-xl border shadow-lg p-6 hover:shadow-md transition-shadow flex items-start gap-6">
                    <div class="flex-1">
                        <div class="space-y-3 mb-3">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                <a href="{{ route('users.show', $user) }}" class="hover:underline">
                                    {{ $user->name }}
                                </a>
                            </h3>
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            <p class="mb-2"><b>{{ __('Email') }}</b>: {{ $user->email }}</p>
                            <p class="mb-2"><b>{{ __('Apellido') }}</b>: {{ $user->surname }}</p>
                            <p><b>{{ __('Center') }}</b>: {{ $user->center->name ?? __('No center assigned') }}</p>
                            Rol: <span class="font-medium text-gray-600">
                                    {{ $user->getRoleNames()->isNotEmpty() ? $user->getRoleNames()->implode(', ') : 'student' }}
                                </span>
                        </div>
                    </div>
                    <a href="{{  route('users.show', ['user' => $user->id]) }}"
                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-yellow-600 bg-yellow-100 hover:bg-yellow-200 dark:bg-yellow-900/30 dark:text-yellow-400 dark:hover:bg-yellow-900/50 rounded-lg transition-colors">
                        <x-svg.eye-icon class="w-4 h-4 mr-1"/>
                        {{ __('View') }}
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $users->links() }}
        </div>
    </div>
</x-layouts.app>
