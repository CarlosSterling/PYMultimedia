<x-layouts.app :title="__('Áreas Disponibles')">
    {{-- Encabezado --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Áreas</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Listado</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <a href="{{ route('admin.areas.create') }}">
            <flux:button variant="primary" type="button">Nueva Área</flux:button>
        </a>
    </div>

    {{-- Título --}}
    <div class="text-center mt-8">
        <h1 class="text-4xl font-extrabold text-zinc-800 dark:text-white">Áreas Disponibles</h1>
    </div>

    {{-- Grid de tarjetas --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-10 px-4 max-w-7xl mx-auto">
        @forelse ($areas as $area)
            <div class="group relative overflow-hidden rounded-2xl shadow-md bg-white dark:bg-zinc-800 transform transition duration-500 hover:scale-[1.02]">

                {{-- Imagen con efecto zoom --}}
                <div class="overflow-hidden">
                    <img src="{{ asset('storage/' . $area->imagen) }}" alt="{{ $area->nombre }}"
                         class="w-full h-[400px] object-cover transition-transform duration-500 group-hover:scale-110">
                </div>

                {{-- Contenido principal --}}
                <div class="p-5 text-center">
                    <h2 class="text-xl font-bold text-zinc-900 dark:text-white">{{ $area->nombre }}</h2>
                </div>

                {{-- Footer oculto que aparece al hacer hover --}}
                <div class="absolute inset-x-0 bottom-0 bg-white dark:bg-zinc-900/90 backdrop-blur px-4 py-4 translate-y-full group-hover:translate-y-0 transition duration-500 ease-in-out">

                    {{-- Estado --}}
                    <div class="mb-2 text-center">
                        @if ($area->estado)
                            <span class="inline-block bg-green-600 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                Activa
                            </span>
                        @else
                            <span class="inline-block bg-zinc-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                Inactiva
                            </span>
                        @endif
                    </div>

                    {{-- Descripción --}}
                    <p class="text-sm text-zinc-700 dark:text-zinc-200 text-center mb-4">
                        {{ Str::limit($area->descripcion, 80) }}
                    </p>

                    {{-- Acciones --}}
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('admin.areas.show', $area) }}"
                           class="px-4 py-1.5 text-sm font-medium bg-green-700 text-white rounded-lg hover:bg-green-800 transition">
                            Ver más
                        </a>

                        <a href="{{ route('admin.areas.edit', $area) }}"
                           class="px-4 py-1.5 text-sm font-medium bg-zinc-700 text-white rounded-lg hover:bg-zinc-800 transition">
                            Editar
                        </a>

                        <form action="{{ route('admin.areas.destroy', $area) }}" method="POST"
                              onsubmit="return confirm('¿Estás seguro de eliminar esta área?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-1.5 text-sm font-medium bg-zinc-700 text-white rounded-lg hover:bg-zinc-800 transition">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-zinc-500 dark:text-zinc-300">
                No hay áreas registradas actualmente.
            </div>
        @endforelse
    </div>
</x-layouts.app>
