<x-layouts.app :title="__('Nueva Área')">
    {{-- Encabezado y navegación --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.areas.index')">Áreas</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="">Crear</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="max-w-3xl mx-auto bg-white dark:bg-zinc-900 p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-center text-zinc-800 dark:text-white">Nueva Área</h1>

        <form action="{{ route('admin.areas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Nombre del área --}}
            <div>
                <label for="nombre" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">
                    Nombre del área
                </label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required
                       placeholder="Ingrese el nombre del área"
                       class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm
                              focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- Descripción --}}
            <div>
                <label for="descripcion" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">
                    Descripción
                </label>
                <textarea name="descripcion" id="descripcion" rows="5" required
                          placeholder="Ingrese una descripción para el área"
                          class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm
                                 focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white">{{ old('descripcion') }}</textarea>
            </div>

            {{-- Imagen representativa --}}
            <div>
                <label for="imagen" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">
                    Imagen representativa
                </label>
                <input type="file" name="imagen" id="imagen" accept="image/*" required
                       class="block w-full text-sm text-zinc-700 dark:text-zinc-100
                              file:mr-4 file:py-2 file:px-4 file:rounded file:border-0
                              file:text-sm file:font-semibold
                              file:bg-zinc-100 file:text-zinc-700 hover:file:bg-zinc-200
                              dark:file:bg-zinc-700 dark:file:text-white dark:hover:file:bg-zinc-600" />
                <p class="text-xs text-zinc-500 mt-1">Selecciona una imagen que represente esta área.</p>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.areas.index') }}"
                   class="inline-block bg-zinc-200 hover:bg-zinc-300 text-zinc-800 font-medium px-6 py-2 rounded transition">
                    Cancelar
                </a>

                <button type="submit"
                        class="bg-zinc-900 hover:bg-zinc-800 text-white font-medium px-6 py-2 rounded transition">
                    Guardar Área
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
