<x-layouts.app :title="__('Listado de Programas')">
    {{-- Breadcrumb --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Programas</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <a href="{{ route('admin.programas.create') }}">
            <flux:button variant="primary">Nuevo Programa</flux:button>
        </a>
    </div>

    {{-- Tarjetas --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-8 mb-24">
        @foreach ($programas as $programa)
            <div class="bg-white dark:bg-zinc-900 rounded-lg shadow-md overflow-hidden border border-zinc-200 dark:border-zinc-700 transition hover:shadow-lg">
                {{-- Imagen --}}
                @if ($programa->imagen)
                    <img src="{{ asset($programa->imagen) }}" alt="{{ $programa->nombre_programa }}"
                        class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-zinc-100 dark:bg-zinc-700 flex items-center justify-center text-zinc-500 dark:text-white text-sm">
                        Sin imagen
                    </div>
                @endif

                {{-- Contenido --}}
                <div class="p-4 space-y-2">
                    <h3 class="text-lg font-bold text-center text-zinc-800 dark:text-white">
                        {{ $programa->nombre_programa }}
                    </h3>
                    <p class="text-center text-sm text-zinc-500 dark:text-zinc-300">
                        {{ $programa->area->nombre ?? 'Área no asignada' }}
                    </p>

                    <div class="text-sm text-zinc-700 dark:text-zinc-200 space-y-1">
                        <p><strong>Instructor:</strong> {{ $programa->instructor_lider }}</p>
                        <p><strong>Implementos:</strong> {{ $programa->implementos_requeridos }}</p>
                        <p><strong>Instructores:</strong> {{ $programa->cantidad_instructores }}</p>
                        <p><strong>Descripción:</strong> {{ Str::limit($programa->descripcion_programa, 100) }}</p>
                    </div>

                    {{-- Requisitos --}}
                    <div class="flex flex-wrap gap-2 mt-3">
                        @if ($programa->requiere_titulo_bachiller)
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-zinc-200 dark:bg-zinc-700 text-zinc-700 dark:text-white rounded">
                                🎓 Bachiller
                            </span>
                        @endif
                        @if ($programa->requiere_icfes)
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-zinc-200 dark:bg-zinc-700 text-zinc-700 dark:text-white rounded">
                                🧠 ICFES
                            </span>
                        @endif
                        @if ($programa->requiere_certificado_medico)
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-zinc-200 dark:bg-zinc-700 text-zinc-700 dark:text-white rounded">
                                🩺 Cert. Médico
                            </span>
                        @endif
                        @if ($programa->requiere_prueba_ingreso)
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-zinc-200 dark:bg-zinc-700 text-zinc-700 dark:text-white rounded">
                                🧾 Prueba Ingreso
                            </span>
                        @endif
                    </div>

                    {{-- Acciones --}}
                    <div class="flex justify-center gap-2 mt-4">
                        <a href="{{ route('admin.programas.edit', $programa->id) }}">
                            <button type="button"
                                class="bg-zinc-800 hover:bg-zinc-700 text-white text-sm px-4 py-1.5 rounded transition">
                                Editar
                            </button>
                        </a>
                        <form action="{{ route('admin.programas.destroy', $programa->id) }}" method="POST"
                              onsubmit="return confirm('¿Deseas eliminar este programa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-1.5 rounded transition">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layouts.app>
