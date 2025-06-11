<x-layouts.app :title="__('My Center')">
    <div class="flex flex-col gap-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ __('My Center') }}
            </h2>
        </div>

        @if($centro)
            <div class="bg-white dark:bg-neutral-900 rounded-xl border shadow-lg p-6 hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            {{ $centro->name }}
                        </h3>
                        <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                            <span>{{ __('Created:') }} {{ $centro->created_at ? $centro->created_at->format('d/m/Y H:i') : __('Date not available') }}</span>
                            @if($centro->created_at != $centro->updated_at)
                                <span>{{ __('Updated:') }} {{ $centro->updated_at ? $centro->updated_at->diffForHumans() : __('Date not available') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center gap-2 ml-4">
                        <a href="{{ route('centers.edit', $centro) }}"
                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 rounded-lg transition-colors">
                            {{ __('Edit') }}
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-12">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                    {{ __("You don't have a center assigned yet") }}
                </h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6">
                    {{ __('Please contact the administrator to assign a center to your account.') }}
                </p>
            </div>
        @endif
    </div>
</x-layouts.app>
