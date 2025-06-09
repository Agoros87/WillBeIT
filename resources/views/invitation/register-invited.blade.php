<x-public-layout title="Completa tu registro">
    <div class="p-8 max-w-3xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="header-1">{{__('Complete your register')}}</h1>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow space-y-6">

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg">
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/register-invited/' . $user->invitation_token) }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{__('Email')}}</label>
                    <input type="email" id="email" value="{{ $user->email }}"
                           class="w-full border border-gray-300 rounded-md p-2 bg-gray-100 cursor-not-allowed"
                           readonly>
                    <input type="hidden" name="email" value="{{ $user->email }}">
                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Name') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                           class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>
                </div>

                <div>
                    <label for="surname" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Surname') }}</label>
                    <input type="text" name="surname" id="surname" value="{{ old('surname', $user->surname) }}"
                           class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Password') }}</label>
                    <input type="password" name="password" id="password"
                           class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>
                </div>

                <div class="flex justify-end gap-4">
                    <button type="submit"
                            class="bg-black text-white px-6 py-2 rounded-md hover:bg-gray-800 transition text-sm font-medium">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-public-layout>
