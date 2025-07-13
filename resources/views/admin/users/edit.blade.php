<x-layouts.app :title="__('Editar Usuario')">
    {{-- Encabezado y navegación --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.users.index')">Usuarios</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Editar</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    {{-- Contenedor del formulario --}}
    <div class="max-w-3xl mx-auto bg-white dark:bg-zinc-900 p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-center text-zinc-800 dark:text-white">Editar Usuario</h1>

        @if (session('error'))
            <div class="mb-4 text-red-600 font-semibold text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Nombre --}}
            <div>
                <flux:input 
                    name="name" 
                    label="Nombre completo"
                    placeholder="Ej: Carlos Sterling"
                    :value="old('name', $user->name)" 
                    required />
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <flux:input 
                    type="email" 
                    name="email" 
                    label="Correo electrónico"
                    placeholder="Ej: correo@ejemplo.com"
                    :value="old('email', $user->email)" 
                    required />
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Rol --}}
            <div>
                <flux:select 
                    name="role" 
                    label="Rol del usuario"
                    required>
                    <option value="">Seleccione un rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ (old('role') ?? $user->roles->first()?->name) === $role->name ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </flux:select>
                @error('role')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Estado Toggle --}}
            <div class="flex items-center gap-4">
                <label for="estado" class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Estado:</label>
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="estado" id="estado" value="1"
                        class="sr-only peer"
                        {{ old('estado', $user->estado) ? 'checked' : '' }}>
                    <div class="w-11 h-6 bg-zinc-300 peer-focus:outline-none rounded-full peer peer-checked:bg-green-600 transition-all duration-300"></div>
                </label>
                <span class="text-sm text-zinc-600 dark:text-zinc-300">
                    {{ old('estado', $user->estado) ? 'Activo' : 'Inactivo' }}
                </span>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('admin.users.index') }}"
                   class="inline-block bg-zinc-200 hover:bg-zinc-300 text-zinc-800 font-medium px-6 py-2 rounded transition">
                    Cancelar
                </a>
                <button type="submit"
                        class="bg-zinc-900 hover:bg-zinc-800 text-white font-medium px-6 py-2 rounded transition">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
