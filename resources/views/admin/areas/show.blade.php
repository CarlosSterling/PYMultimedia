<x-layouts.app :title="__('Detalles del Área')">
    {{-- Breadcrumb --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.areas.index')">Áreas</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="">Detalles</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <a href="{{ route('admin.areas.index') }}">
            <flux:button variant="outline">Volver</flux:button>
        </a>
    </div>

    <div class="max-w-4xl mx-auto bg-white dark:bg-zinc-900 p-6 rounded shadow-md">
        {{-- Imagen --}}
        <div class="mb-6 text-center">
            <img src="{{ asset('storage/' . $area->imagen) }}" alt="{{ $area->nombre }}"
                class="w-full h-96 object-cover rounded-xl shadow" />
        </div>

        {{-- Nombre del Área --}}
        <h1 class="text-3xl font-extrabold text-zinc-800 dark:text-white mb-4 text-center">
            {{ $area->nombre }}
        </h1>

        {{-- Estado --}}
        <div class="mb-4 text-center">
            @if ($area->estado)
                <span class="inline-block bg-green-600 text-white text-sm font-medium px-3 py-1 rounded-full">
                    Área activa
                </span>
            @else
                <span class="inline-block bg-zinc-500 text-white text-sm font-medium px-3 py-1 rounded-full">
                    Área inactiva
                </span>
            @endif
        </div>

        {{-- Descripción --}}
        <div class="text-zinc-700 dark:text-zinc-300 leading-relaxed text-justify">
            {{ $area->descripcion }}
        </div>
    </div>
</x-layouts.app>
