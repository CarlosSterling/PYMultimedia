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
        <h1 class="text-4xl font-bold text-gray-800">Áreas Disponibles</h1>
    </div>

    {{-- Grid de tarjetas --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-10 px-4 max-w-7xl mx-auto">
        @forelse ($areas as $area)
            <div class="group relative overflow-hidden rounded-xl shadow-lg bg-white transform transition duration-500 hover:scale-105">

                {{-- Imagen con efecto de zoom --}}
                <div class="overflow-hidden">
                    <img src="{{ asset('storage/' . $area->imagen) }}" alt="{{ $area->nombre }}"
                        class="w-full h-[450px] object-cover transition-transform duration-500 group-hover:scale-110">
                </div>

                {{-- Contenedor con nombre --}}
                <div class="p-4 text-center">
                    <h2 class="text-xl font-bold text-gray-900">{{ $area->nombre }}</h2>
                </div>

                {{-- Footer oculto que aparece al hacer hover --}}
                <div class="absolute bottom-0 left-0 right-0 bg-white bg-opacity-95 px-4 py-3 transform translate-y-full group-hover:translate-y-0 transition duration-500 ease-in-out">

                    {{-- Estado --}}
                    <div class="mb-2 text-center">
                        @if ($area->estado)
                            <span class="inline-block bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">
                                Activa
                            </span>
                        @else
                            <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">
                                Inactiva
                            </span>
                        @endif
                    </div>

                    <p class="text-sm text-gray-700 text-center mb-3">{{ Str::limit($area->descripcion, 80) }}</p>

                    {{-- Acciones --}}
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('admin.areas.show', $area) }}"
                            class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700 transition">
                            Ver más
                        </a>

                        <a href="{{ route('admin.areas.edit', $area) }}"
                            class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition">
                            Editar
                        </a>

                        <form action="{{ route('admin.areas.destroy', $area) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro de eliminar esta área?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700 transition">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500">
                No hay áreas registradas actualmente.
            </div>
        @endforelse
    </div>
</x-layouts.app>
