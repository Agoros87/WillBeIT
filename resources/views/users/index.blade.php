<x-public-layout title="Usuarios">
    <div class="p-8 max-w-6xl mx-auto">

        @role('superadmin')
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-4xl font-semibold tracking-tight">Gestión de Usuarios</h1>
            <div class="flex gap-3">
                <a href="{{ route('superadmin.dashboard') }}"
                   class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
                    Dashboard
                </a>
                <a href="{{ route('users.create') }}"
                   class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition text-sm font-medium">
                    Nuevo Usuario
                </a>
            </div>
        </div>
        @endrole

        @if (session('success'))
            <div class="alert-success mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg shadow-sm transition-opacity duration-500">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($users as $user)
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <div class="flex justify-between items-start gap-4">
                        <div>
                            <h2 class="text-lg font-medium">{{ $user->name }}</h2>
                            <p class="text-sm text-gray-500">Apellido: {{ $user->surname }}</p>
                            <p class="text-sm text-gray-500">Email: {{ $user->email }}</p>
                            <p class="text-sm text-gray-500">Centro: {{ $user->center->name }}</p>
                            <p class="text-sm text-gray-400 mt-1">
                                Rol: <span class="font-medium text-gray-600">
                                    {{ $user->getRoleNames()->isNotEmpty() ? $user->getRoleNames()->implode(', ') : 'student' }}
                                </span>
                            </p>
                            <p class="text-xs text-gray-400 mt-1">Creado: {{ $user->created_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="flex flex-col items-end gap-2">
                            <a href="{{ route('users.show', $user->id) }}"
                               class="w-24 text-center px-3 py-1.5 text-sm border border-gray-300 rounded-md hover:bg-gray-100 transition">
                                Ver
                            </a>
                            @role('superadmin')
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="w-24 text-center px-3 py-1.5 text-sm border border-blue-300 text-blue-500 rounded-md hover:bg-blue-50 transition">
                                Editar
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                  onsubmit="return confirm('¿Eliminar este usuario?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-24 text-center px-3 py-1.5 text-sm border border-red-300 text-red-500 rounded-md hover:bg-red-50 transition">
                                    Eliminar
                                </button>
                            </form>
                            @endrole
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $users->links() }}
        </div>
    </div>

    <script>
        setTimeout(() => {
            const alert = document.querySelector('.alert-success');
            if (alert) {
                alert.classList.add('opacity-0');
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>
</x-public-layout>
