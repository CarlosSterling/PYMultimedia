<x-layouts.app :title="__('Crear Programa')">

    {{-- Breadcrumb --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.programas.index')">Programas</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Crear</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    {{-- Contenedor principal --}}
    <div class="max-w-3xl mx-auto bg-white dark:bg-zinc-900 p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-center text-zinc-800 dark:text-white">Crear Programa</h1>

        <form method="POST" action="{{ route('admin.programas.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- NOMBRE --}}
            <div>
                <label for="nombre_programa" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">
                    Nombre del programa
                </label>
                <input type="text" name="nombre_programa" id="nombre_programa" value="{{ old('nombre_programa') }}" required
                       placeholder="Ingrese el nombre del programa"
                       class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm 
                              focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- ÁREA --}}
            <div>
                <label for="area_id" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">
                    Área
                </label>
                <select name="area_id" id="area_id" required
                        class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm 
                               focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white">
                    <option value="" disabled selected>Seleccione el área</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                            {{ $area->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- DESCRIPCIÓN --}}
            <div>
                <label for="descripcion_programa" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">
                    Descripción del programa
                </label>
                <textarea name="descripcion_programa" id="descripcion_programa" rows="5" required
                          placeholder="Describa brevemente el programa"
                          class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm 
                                 focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white">{{ old('descripcion_programa') }}</textarea>
            </div>

            {{-- IMAGEN --}}
            <div>
                <label for="imagen" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">Imagen del programa</label>
                <input type="file" name="imagen" id="imagen" accept="image/*" required
                       class="block w-full text-sm text-zinc-700 dark:text-zinc-100
                              file:mr-4 file:py-2 file:px-4 file:rounded file:border-0
                              file:text-sm file:font-semibold file:bg-zinc-100 file:text-zinc-700
                              hover:file:bg-zinc-200 dark:file:bg-zinc-700 dark:file:text-white dark:hover:file:bg-zinc-600">
                <p class="text-xs text-zinc-500 mt-1">Cargue una imagen representativa del programa.</p>
            </div>

            {{-- INSTRUCTOR LÍDER --}}
            <div>
                <label for="instructor_lider" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">
                    Instructor líder
                </label>
                <input type="text" name="instructor_lider" id="instructor_lider" value="{{ old('instructor_lider') }}"
                       placeholder="Nombre del instructor líder"
                       class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm 
                              focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- REQUISITOS --}}
            <div>
                <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-2">Requisitos</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    @foreach ([
                        'requiere_titulo_bachiller' => 'Requiere título de bachiller',
                        'requiere_icfes' => 'Requiere ICFES',
                        'requiere_certificado_medico' => 'Requiere certificado médico',
                        'requiere_prueba_ingreso' => 'Requiere prueba de ingreso',
                    ] as $name => $label)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="{{ $name }}" class="form-checkbox text-green-600 focus:ring-green-500">
                            <span class="ml-2 text-sm text-zinc-700 dark:text-zinc-200">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- IMPLEMENTOS --}}
            <div>
                <label for="implementos_requeridos" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">
                    Implementos requeridos
                </label>
                <input type="text" name="implementos_requeridos" id="implementos_requeridos"
                       value="{{ old('implementos_requeridos') }}"
                       placeholder="Uniformes, herramientas, etc."
                       class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm 
                              focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- CANTIDAD INSTRUCTORES --}}
            <div>
                <label for="cantidad_instructores" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">
                    Cantidad de instructores
                </label>
                <input type="number" name="cantidad_instructores" id="cantidad_instructores"
                       value="{{ old('cantidad_instructores') }}"
                       class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm 
                              focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- DETALLE INSTRUCTORES --}}
            <div>
                <label for="detalle_instructores" class="block text-sm font-medium text-zinc-700 dark:text-zinc-100 mb-1">
                    Detalle de instructores
                </label>
                <textarea name="detalle_instructores" id="detalle_instructores" rows="4"
                          placeholder="Nombres, roles, etc."
                          class="block w-full border-zinc-300 dark:border-zinc-700 rounded px-4 py-2 shadow-sm 
                                 focus:ring focus:ring-green-500 focus:border-green-500 dark:bg-zinc-800 dark:text-white">{{ old('detalle_instructores') }}</textarea>
            </div>

            {{-- BOTONES --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.programas.index') }}"
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
