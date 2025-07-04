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

    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-md">
        {{-- Imagen --}}
        <div class="mb-6 text-center">
            <img src="{{ asset('storage/' . $area->imagen) }}" alt="{{ $area->nombre }}"
                class="w-full h-96 object-cover rounded">
        </div>

        {{-- Nombre --}}
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $area->nombre }}</h1>

        {{-- Estado --}}
        <div class="mb-4">
            @if ($area->estado)
                <span class="inline-block bg-green-500 text-white text-sm px-3 py-1 rounded">Área activa</span>
            @else
                <span class="inline-block bg-red-500 text-white text-sm px-3 py-1 rounded">Área inactiva</span>
            @endif
        </div>

        {{-- Descripción --}}
        <div class="text-gray-700 leading-relaxed">
            {{ $area->descripcion }}
        </div>
    </div>

</x-layouts.app>
