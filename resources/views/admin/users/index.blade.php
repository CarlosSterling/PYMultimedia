<x-layouts.app :title="__('Usuarios')">
    {{-- Breadcrumbs --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Usuarios</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Listado</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    {{-- Contenido principal --}}
    <div class="max-w-6xl mx-auto px-6 py-8">

        {{-- Encabezado --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Usuarios registrados</h1>
            <a href="{{ route('admin.users.create') }}"
               class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                + Nuevo Usuario
            </a>
        </div>

        {{-- Mensajes --}}
        @if (session('success'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 text-red-600 font-semibold">
                {{ session('error') }}
            </div>
        @endif

        {{-- Tabla de usuarios --}}
        <div class="overflow-x-auto bg-white dark:bg-zinc-900 shadow rounded">
            <table class="min-w-full table-auto text-sm text-left">
                <thead class="bg-zinc-100 dark:bg-zinc-800 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Correo</th>
                        <th class="px-4 py-2">Rol</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                    @forelse($users as $user)
                        <tr>
                            <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $user->name }}</td>
                            <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $user->email }}</td>
                            <td class="px-4 py-2 text-gray-800 dark:text-gray-100">
                                {{ $user->roles->pluck('name')->implode(', ') ?: 'Sin rol' }}
                            </td>
                            <td class="px-4 py-2 flex space-x-2">
                                {{-- Botón Editar --}}
                                <flux:button 
                                    type="link" 
                                    variant="primary" 
                                    size="sm" 
                                    href="{{ route('admin.users.edit', $user) }}"
                                    icon="pencil">
                                    Editar
                                </flux:button>

                                {{-- Botón Eliminar --}}
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                      onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                                    @csrf
                                    @method('DELETE')
                                    <flux:button type="submit" variant="danger" size="sm" icon="trash">
                                        Eliminar
                                    </flux:button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                No hay usuarios registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-layouts.app>
