<x-layouts.app :title="__('Crear Convenio')">
    {{-- Breadcrumb --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.convenios.index')">Convenios</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="">Nuevo</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    {{-- Contenedor principal --}}
    <div class="max-w-3xl mx-auto bg-white dark:bg-zinc-900 p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-center text-zinc-800 dark:text-white">Nuevo Convenio</h1>

        <form action="{{ route('admin.convenios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Nombre del convenio --}}
            <div>
                <label for="nombre" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">Nombre del convenio</label>
                <input type="text" name="nombre" id="nombre" required
                       class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm
                              focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white"
                       placeholder="Ingrese el nombre del convenio"
                       value="{{ old('nombre') }}">
            </div>

            {{-- Logo del convenio --}}
            <div>
                <label for="logo" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">Logo</label>
                <input type="file" name="logo" id="logo" accept="image/*"
                       class="block w-full text-sm text-zinc-700 dark:text-zinc-100
                              file:mr-4 file:py-2 file:px-4 file:rounded file:border-0
                              file:text-sm file:font-semibold
                              file:bg-zinc-100 file:text-zinc-700
                              hover:file:bg-zinc-200
                              dark:file:bg-zinc-700 dark:file:text-white dark:hover:file:bg-zinc-600" />
                <p class="text-xs text-zinc-500 mt-1">Carga un logo representativo del convenio.</p>
            </div>

            {{-- Enlace --}}
            <div>
                <label for="enlace" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">Enlace</label>
                <input type="url" name="enlace" id="enlace"
                       placeholder="https://www.sena.edu.co"
                       class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm
                              focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white"
                       value="{{ old('enlace') }}">
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.convenios.index') }}"
                   class="inline-block bg-zinc-200 hover:bg-zinc-300 text-zinc-800 font-medium px-6 py-2 rounded transition">
                    Cancelar
                </a>

                <button type="submit"
                        class="bg-zinc-900 hover:bg-zinc-800 text-white font-medium px-6 py-2 rounded transition">
                    Guardar Convenio
                </button>
            </div>
        </form>
    </div>

    {{-- Footer decorativo --}}
    <footer class="fixed bottom-0 left-0 w-full z-[-1]">
        <img 
            src="{{ asset('images/footer-shape.png') }}" 
            alt="Decoración inferior" 
            class="w-full h-[100px] object-cover md:h-[100px] lg:h-[350px]"
        >
    </footer>
</x-layouts.app>
