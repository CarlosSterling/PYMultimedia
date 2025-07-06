<x-layouts.app :title="__('Listado de Programas')">
    {{-- Encabezado y navegación --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Programas</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <a href="{{ route('admin.programas.create') }}">
            <flux:button variant="primary">Nuevo Programa</flux:button>
        </a>
    </div>

    {{-- Tarjetas de programas --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-8">
        @foreach ($programas as $programa)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                {{-- Imagen --}}
                @if ($programa->imagen)
                    <img src="{{ asset($programa->imagen) }}" alt="{{ $programa->nombre_programa }}"
                        class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                        Sin imagen
                    </div>
                @endif

                {{-- Contenido --}}
                <div class="p-4">
                    <h3 class="text-xl font-bold text-center">{{ $programa->nombre_programa }}</h3>
                    <p class="text-center text-gray-500 mb-2">
                        {{ $programa->area->nombre ?? 'Área no asignada' }}
                    </p>

                    <p><strong>Instructor:</strong> {{ $programa->instructor_lider }}</p>
                    <p><strong>Implementos:</strong> {{ $programa->implementos_requeridos }}</p>
                    <p><strong>Instructores:</strong> {{ $programa->cantidad_instructores }}</p>
                    <p><strong>Descripción:</strong> {{ $programa->descripcion_programa }}</p>

                    {{-- Requisitos --}}
                    <div class="flex flex-wrap gap-2 mt-2">
                        @if ($programa->requiere_titulo_bachiller)
                            <span class="bg-blue-100 text-blue-700 text-sm px-2 py-1 rounded">
                                🎓 Bachiller
                            </span>
                        @endif
                        @if ($programa->requiere_icfes)
                            <span class="bg-pink-100 text-pink-700 text-sm px-2 py-1 rounded">
                                🧠 ICFES
                            </span>
                        @endif
                        @if ($programa->requiere_certificado_medico)
                            <span class="bg-rose-100 text-rose-700 text-sm px-2 py-1 rounded">
                                🩺 Cert. Médico
                            </span>
                        @endif
                        @if ($programa->requiere_prueba_ingreso)
                            <span class="bg-yellow-100 text-yellow-700 text-sm px-2 py-1 rounded">
                                🧾 Prueba Ingreso
                            </span>
                        @endif
                    </div>

                    {{-- Acciones --}}
                    <div class="flex justify-center gap-2 mt-4">
                        <a href="{{ route('admin.programas.edit', $programa->id) }}">
                            <flux:button variant="primary">Editar</flux:button>
                        </a>
                        <form action="{{ route('admin.programas.destroy', $programa->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <flux:button variant="danger" type="submit">Eliminar</flux:button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layouts.app>
