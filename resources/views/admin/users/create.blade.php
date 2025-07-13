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
    <div class="max-w-3xl mx-auto bg-white dark:bg-zinc-900 p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-center text-zinc-800 dark:text-white">Registrar Usuario</h1>

        @if (session('error'))
            <div class="mb-4 text-red-600 font-semibold text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Nombre --}}
            <div>
                <label for="name" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">Nombre completo</label>
                <input type="text" name="name" id="name" placeholder="Ej: Carlos Sterling" value="{{ old('name') }}" required
                       class="w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white" />
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">Correo electrónico</label>
                <input type="email" name="email" id="email" placeholder="Ej: correo@ejemplo.com" value="{{ old('email') }}" required
                       class="w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white" />
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contraseña --}}
            <div>
                <label for="password" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="********" required
                       class="w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white" />
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirmar contraseña --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="********" required
                       class="w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- Rol --}}
            <div>
                <label for="role" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">Rol del usuario</label>
                <select name="role" id="role" required
                        class="w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm dark:bg-zinc-800 dark:text-white focus:ring focus:ring-green-500 focus:border-green-500">
                    <option value="">Seleccione un rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ old('role') === $role->name ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
                @error('role')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('admin.users.index') }}"
                   class="inline-block bg-zinc-200 hover:bg-zinc-300 text-zinc-800 font-medium px-6 py-2 rounded transition">
                    Cancelar
                </a>
                <button type="submit"
                        class="bg-zinc-900 hover:bg-zinc-800 text-white font-medium px-6 py-2 rounded transition">
                    Registrar
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
