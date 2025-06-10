<x-public-layout title="Crear nuevo usuario">
    <div class="p-8 max-w-3xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="header-1">Crear nuevo usuario</h1>
        </div>

        <div class="bg-white dark:bg-zinc-900 border border-gray-200 rounded-xl p-6 shadow space-y-6">

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg">
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST" class="space-y-6 dark:bg-zinc-900 [&_label]:text-gray-700 dark:[&_label]:text-gray-200 [&_input]:text-gray-900 dark:[&_input]:text-gray-200 [&_select]:text-gray-900 dark:[&_select]:text-gray-200">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-200">{{__('Name')}}</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="w-full border border-gray-300 dark:text-gray-200 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>
                </div>

                <div>
                    <label for="surname" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">{{__('Surname')}}</label>
                    <input type="text" name="surname" id="surname" value="{{ old('surname') }}"
                           class="w-full border border-gray-300 dark:text-gray-200 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{__('Email')}}</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                           class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">{{__('Type (optional)')}}</label>
                    <input type="text" name="type" id="type" value="{{ old('type') }}"
                           class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label for="center_id" class="block text-sm font-medium text-gray-700 mb-1">{{__('Centers')}}</label>
                    <select name="center_id" id="center_id" required
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-zinc-900 dark:text-gray-200">
                        <option value="">{{__('Select a center')}}</option>
                        @foreach($centers as $center)
                            <option value="{{ $center->id }}" {{ old('center_id') == $center->id ? 'selected' : '' }}>
                                {{ $center->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="roles" class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
                    <select name="roles[]" id="roles"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-zinc-900 dark:text-gray-200">
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ collect(old('roles'))->contains($role->name) ? 'selected' : '' }}>
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">{{__('Password')}}</label>
                    <input type="password" name="password" id="password"
                           class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('users.index') }}"
                       class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 transition text-sm font-medium">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="bg-black text-white px-6 py-2 rounded-md hover:bg-gray-800 transition text-sm font-medium">
                        Crear Usuario
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-public-layout>
