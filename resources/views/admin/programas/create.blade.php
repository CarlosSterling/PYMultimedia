<x-layouts.app :title="__('Crear Programa')">

    {{-- Encabezado y navegación --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.programas.index')">Programas</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Crear</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    {{-- Contenedor del formulario --}}
    <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded">
        <form method="POST" action="{{ route('admin.programas.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- Nombre del programa --}}
            <div class="mb-4">
                <flux:input 
                    name="nombre_programa" 
                    label="Nombre del programa"
                    placeholder="Ingrese el nombre del programa"
                    :value="old('nombre_programa')"
                    required 
                    class="w-full" />
            </div>

            {{-- Área --}}
            <div class="mb-4">
                <label for="area_id" class="block font-semibold mb-1">Área</label>
                <select name="area_id" id="area_id" class="w-full rounded border-gray-300 dark:bg-zinc-800 dark:text-white" required>
                    <option value="" disabled selected>Seleccione el área</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                            {{ $area->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Descripción --}}
            <div class="mb-4">
                <flux:textarea 
                    name="descripcion_programa" 
                    label="Descripción del programa"
                    placeholder="Describa brevemente el programa"
                    rows="4"
                    required>{{ old('descripcion_programa') }}</flux:textarea>
            </div>

            {{-- Imagen del programa --}}
            <div class="mb-4">
                <flux:input 
                    type="file" 
                    name="imagen" 
                    label="Imagen del programa" 
                    accept="image/*" 
                    required 
                    class="w-full" />
            </div>

            {{-- Instructor líder --}}
            <div class="mb-4">
                <flux:input 
                    name="instructor_lider" 
                    label="Instructor líder"
                    placeholder="Nombre del instructor líder"
                    :value="old('instructor_lider')"
                    class="w-full" />
            </div>

            {{-- Requisitos --}}
            <div class="grid grid-cols-2 gap-4 mb-4">
                @foreach ([
                    'requiere_titulo_bachiller' => 'Requiere título de bachiller',
                    'requiere_icfes' => 'Requiere ICFES',
                    'requiere_certificado_medico' => 'Requiere certificado médico',
                    'requiere_prueba_ingreso' => 'Requiere prueba de ingreso',
                ] as $name => $label)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="{{ $name }}" class="form-checkbox">
                        <span class="ml-2">{{ $label }}</span>
                    </label>
                @endforeach
            </div>

            {{-- Implementos requeridos --}}
            <div class="mb-4">
                <flux:input 
                    name="implementos_requeridos" 
                    label="Implementos requeridos"
                    placeholder="Uniformes, herramientas, etc."
                    :value="old('implementos_requeridos')"
                    class="w-full" />
            </div>

            {{-- Cantidad de instructores --}}
            <div class="mb-4">
                <flux:input 
                    type="number" 
                    name="cantidad_instructores" 
                    label="Cantidad de instructores"
                    :value="old('cantidad_instructores')"
                    class="w-full" />
            </div>

            {{-- Detalle de instructores --}}
            <div class="mb-4">
                <flux:textarea 
                    name="detalle_instructores" 
                    label="Detalle de instructores"
                    placeholder="Nombres, roles, etc."
                    rows="3">{{ old('detalle_instructores') }}</flux:textarea>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-2 mt-6">
                <a href="{{ route('admin.programas.index') }}">
                    <flux:button variant="outline" type="button">Cancelar</flux:button>
                </a>
                <flux:button type="submit" variant="primary">Guardar Programa</flux:button>
            </div>

        </form>
    </div>

</x-layouts.app>
