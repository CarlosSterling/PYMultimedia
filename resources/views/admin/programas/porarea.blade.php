<x-layouts.app :title="__('Programas de ' . $area->nombre)">
    <div class="px-8 mt-6">
        <h1 class="text-3xl font-bold mb-4">Área: {{ $area->nombre }}</h1>

        <div class="text-gray-600 leading-relaxed">
            <p>{{ $area->descripcion }}</p>
        </div>

        @if ($area->imagen)
            <div class="mt-4">
                <img src="{{ asset('storage/' . $area->imagen) }}" alt="{{ $area->nombre }}"
                    class="w-full max-w-md rounded shadow">
            </div>
        @endif
    </div>
</x-layouts.app>
