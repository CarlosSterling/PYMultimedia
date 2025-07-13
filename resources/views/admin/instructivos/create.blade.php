<x-layouts.app :title="__('Crear Instructivo')">
    {{-- Breadcrumb --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.instructivos.index')">Instructivos</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="">Crear</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    {{-- Contenedor principal --}}
    <div class="max-w-3xl mx-auto bg-white dark:bg-zinc-900 p-6 rounded shadow mt-8">
        <h1 class="text-2xl font-bold mb-6 text-center text-zinc-800 dark:text-white">Nuevo Instructivo</h1>

        <form action="{{ route('admin.instructivos.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Título --}}
            <div>
                <label for="titulo" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">Título</label>
                <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" required
                    class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm
                           focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white"
                    placeholder="Ingrese el título del instructivo">
            </div>

            {{-- Enlace --}}
            <div>
                <label for="enlace" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">Enlace</label>
                <input type="url" name="enlace" id="enlace" value="{{ old('enlace') }}"
                    class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm
                           focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white"
                    placeholder="https://ejemplo.com/archivo.pdf">
            </div>

            {{-- Estado --}}
            <div>
                <label for="estado" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">Estado</label>
                <label class="inline-flex items-center cursor-pointer relative w-11 h-6">
                    <input type="checkbox" name="estado" id="estado" value="1" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-zinc-400 peer-checked:bg-green-600 rounded-full transition-colors duration-300"></div>
                    <div class="absolute top-0.5 left-0.5 w-5 h-5 bg-white border rounded-full transition-transform duration-300 peer-checked:translate-x-full"></div>
                </label>
                <span class="ml-3 text-sm text-zinc-600 dark:text-zinc-300">Activo</span>
            </div>

            {{-- Orden --}}
            <div>
                <label for="orden" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">Orden</label>
                <input type="number" name="orden" id="orden" value="{{ old('orden') }}"
                    class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm
                           focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white"
                    placeholder="Ej: 1">
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.instructivos.index') }}"
                   class="inline-block bg-zinc-200 hover:bg-zinc-300 text-zinc-800 font-medium px-6 py-2 rounded transition">
                    Cancelar
                </a>

                <button type="submit"
                        class="bg-zinc-900 hover:bg-zinc-800 text-white font-medium px-6 py-2 rounded transition">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
