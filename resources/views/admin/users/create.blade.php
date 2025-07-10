<x-layouts.app :title="__('Registrar Usuario')">
    {{-- Encabezado y navegación --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.users.index')">Usuarios</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Registrar</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    {{-- Contenedor del formulario --}}
    <div class="max-w-3xl mx-auto bg-white dark:bg-zinc-900 p-6 shadow-md rounded">
        @if (session('error'))
            <div class="mb-4 text-red-600 font-semibold">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            {{-- Nombre --}}
            <div class="mb-4">
                <flux:input 
                    name="name" 
                    label="Nombre completo"
                    placeholder="Ej: Carlos Sterling"
                    :value="old('name')" 
                    required />
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <flux:input 
                    type="email" 
                    name="email" 
                    label="Correo electrónico"
                    placeholder="Ej: correo@ejemplo.com"
                    :value="old('email')" 
                    required />
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contraseña --}}
            <div class="mb-4">
                <flux:input 
                    type="password" 
                    name="password" 
                    label="Contraseña"
                    placeholder="********" 
                    required />
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirmar contraseña --}}
            <div class="mb-4">
                <flux:input 
                    type="password" 
                    name="password_confirmation" 
                    label="Confirmar contraseña"
                    placeholder="********" 
                    required />
            </div>

            {{-- Rol --}}
            <div class="mb-6">
                <flux:select 
                    name="role" 
                    label="Rol del usuario"
                    required>
                    <option value="">Seleccione un rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ old('role') === $role->name ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </flux:select>
                @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.users.index') }}"
                   class="inline-block px-4 py-2 bg-gray-300 dark:bg-zinc-700 text-gray-800 dark:text-white rounded hover:bg-gray-400 dark:hover:bg-zinc-600 transition">
                    Cancelar
                </a>
                <flux:button type="submit" variant="primary">
                    Registrar
                </flux:button>
            </div>
        </form>
    </div>
</x-layouts.app>
