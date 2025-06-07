<x-public-layout title="Editar usuario">
    <div class="p-8 max-w-3xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="header-1">Editar usuario</h1>
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

            <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                           class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>
                </div>

                <div>
                    <label for="surname" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                    <input type="text" name="surname" id="surname" value="{{ old('surname', $user->surname) }}"
                           class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                           class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Tipo (opcional)</label>
                    <input type="text" name="type" id="type" value="{{ old('type', $user->type) }}"
                           class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label for="center_id" class="block text-sm font-medium text-gray-700 mb-1">Centro</label>
                    <select name="center_id" id="center_id" required
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Selecciona un centro</option>
                        @foreach($centers as $center)
                            <option value="{{ $center->id }}" {{ old('center_id', $user->center_id) == $center->id ? 'selected' : '' }}>
                                {{ $center->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="roles" class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
                    <select name="roles[]" id="roles"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ $user->roles->pluck('name')->contains($role->name) ? 'selected' : '' }}>
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña (opcional)</label>
                    <input type="password" name="password" id="password"
                           placeholder="Déjalo en blanco si no deseas cambiarla"
                           class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('users.index') }}"
                       class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-100 transition text-sm font-medium">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-black text-white rounded-md hover:bg-gray-800 transition text-sm font-medium">
                        Actualizar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-public-layout>
