<x-layouts.app :title="__('Teacher Dashboard')">
    <div class="flex flex-col gap-6">
        <h2 class="text-center header-1" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.2);">
            {{ __('Teacher Dashboard') }}
        </h2>
        {{-- Tarjetas de estadísticas --}}
        <div class="grid grid-cols-1 md:grid-cols-7 gap-5">
            <div class="rounded-xl border p-5 bg-gradient-to-br from-green-500 to-green-400 text-white shadow-lg col-span-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium">{{__('Students')}}</p>
                        <p class="text-3xl font-bold mt-2">{{ $studentsApprovedAll }}</p>
                    </div>
                    <svg class="w-8 h-8 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>
            <div class="rounded-xl border p-5 bg-gradient-to-br from-yellow-500 to-yellow-400 text-white shadow-lg col-span-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium">{{__('Pending Students')}}</p>
                        <p class="text-3xl font-bold mt-2">{{ $studentsPendingAll }}</p>
                    </div>
                    <svg class="w-8 h-8 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"/>
                    </svg>
                </div>
            </div>
            <div class="flex justify-end ">
                <a href="{{ route('invitation.create') }}" class="p-4 rounded-xl cursor-pointer bg-white dark:bg-neutral-900 border shadow-lg hover:shadow-md transition-all flex flex-col items-center justify-center group hover:bg-green-200 dark:hover:bg-green-800">
                    <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-green-400">{{__('Invite Users')}}</span>
                </a>
            </div>
        </div>

        {{-- Listados --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
                <h3 class="text-lg font-semibold mb-4 text-green-600">{{ __('Center Students') }}</h3>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($studentsApproved as $student)
                        <li class="py-2 flex flex-col">
                            <span class="font-medium">{{ $student->name }}</span>
                            <span class="text-sm text-gray-500">{{ $student->email }}</span>
                        </li>
                    @empty
                        <li class="py-2 text-gray-500">{{ __('There are no students of your center.') }}</li>

                    @endforelse
                    <div class="mt-4">
                        {{ $studentsApproved->appends(request()->except('pending_page'))->links() }}
                    </div>
                </ul>
            </div>
            <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
                <h3 class="text-lg font-semibold mb-4 text-yellow-600">{{ __('Pending Students') }}</h3>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($studentsPending as $student)
                        <li class="py-2 flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                            <div>
                                <span class="font-medium">{{ $student->name }}</span>
                                <span class="text-sm text-gray-500">{{ $student->email }}</span>
                            </div>
                            <div class="flex gap-2">
                                <form action="{{ route('students.accept', $student->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 rounded bg-green-500 text-white text-xs hover:bg-green-600 transition">
                                        <x-svg.check-icon/>
                                    </button>
                                </form>
                                <form action="{{ route('students.reject', $student->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 rounded bg-red-500 text-white text-xs hover:bg-red-600 transition">
                                        <x-svg.cross-icon/>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="py-2 text-gray-500">{{ __('There are no pending students.') }}</li>
                    @endforelse
                    <div class="mt-4">
                        {{ $studentsPending->appends(request()->except('approved_page'))->links() }}
                    </div>
                </ul>
            </div>

        </div>
        <div class="rounded-xl border p-5 bg-white dark:bg-neutral-900 shadow-lg">
            <h3 class="text-lg font-semibold mb-4 text-yellow-600">{{ __('Pending Post') }}</h3>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($postPending as $post)
                    <li class="py-2 flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                        <div>
                            <a href="{{ route('posts.show', $post) }}" class="hover:underline">
                                {{ $post->title }}
                            </a>
                            <span class="text-sm text-gray-500">{{ $post->user->name }}</span>
                        </div>
                        <div class="flex gap-2">
                            <form method="POST" action="{{ route('post.accept', $post->id) }}" >
                                @csrf
                                <button type="submit" class="px-3 py-1 rounded bg-green-500 text-white text-xs hover:bg-green-600 transition">
                                    <x-svg.check-icon/>
                                </button>
                            </form>
                            <form method="POST" action="{{ route('post.reject', $post->id) }}">
                                @csrf
                                <button type="submit" class="px-3 py-1 rounded bg-red-500 text-white text-xs hover:bg-red-600 transition">
                                    <x-svg.cross-icon/>
                                </button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li class="py-2 text-gray-500">{{ __('There are no pending students.') }}</li>
                @endforelse
                <div class="mt-4">
                    {{ $postPending->appends(request()->except('post_pending_page'))->links() }}
                </div>
            </ul>
        </div>
    </div>
</x-layouts.app>
