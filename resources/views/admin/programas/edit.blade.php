<x-layouts.app :title="__('Editar Programa')">
    {{-- Encabezado --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.programas.index')">Programas</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Editar</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    {{-- Contenedor central --}}
    <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded">
        <form method="POST" action="{{ route('admin.programas.update', $programa) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Nombre del Programa --}}
            <div class="mb-4">
                <flux:input 
                    type="text" 
                    name="nombre_programa" 
                    label="Nombre del programa" 
                    :value="old('nombre_programa', $programa->nombre_programa)" 
                    required />
            </div>

            {{-- Área --}}
            <div class="mb-4">
                <label for="area_id" class="block font-semibold mb-1">Área</label>
                <select name="area_id" id="area_id" class="w-full rounded border-gray-300">
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}" {{ $programa->area_id == $area->id ? 'selected' : '' }}>
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
                    rows="4"
                >{{ old('descripcion_programa', $programa->descripcion_programa) }}</flux:textarea>
            </div>

            {{-- Imagen actual --}}
            <div class="mb-4">
                <flux:input 
                    type="file" 
                    name="imagen" 
                    label="Imagen del programa" 
                    accept="image/*" />
                @if ($programa->imagen)
                    <img src="{{ asset($programa->imagen) }}" alt="Imagen actual" class="h-24 mt-2 rounded shadow">
                @endif
            </div>

            {{-- Instructor líder --}}
            <div class="mb-4">
                <flux:input 
                    type="text" 
                    name="instructor_lider" 
                    label="Instructor líder" 
                    :value="old('instructor_lider', $programa->instructor_lider)" />
            </div>

            {{-- Requisitos --}}
            <div class="grid grid-cols-2 gap-4 mb-4">
                @foreach ([
                    'requiere_titulo_bachiller' => 'Requiere título bachiller',
                    'requiere_icfes' => 'Requiere ICFES',
                    'requiere_certificado_medico' => 'Requiere certificado médico',
                    'requiere_prueba_ingreso' => 'Requiere prueba de ingreso'
                ] as $name => $label)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="{{ $name }}" value="1"
                               class="form-checkbox"
                               {{ old($name, $programa->$name) ? 'checked' : '' }}>
                        <span class="ml-2 text-sm">{{ $label }}</span>
                    </label>
                @endforeach
            </div>

            {{-- Implementos requeridos --}}
            <div class="mb-4">
                <flux:input 
                    type="text" 
                    name="implementos_requeridos" 
                    label="Implementos requeridos" 
                    :value="old('implementos_requeridos', $programa->implementos_requeridos)" />
            </div>

            {{-- Cantidad de instructores --}}
            <div class="mb-4">
                <flux:input 
                    type="number" 
                    name="cantidad_instructores" 
                    label="Cantidad de instructores" 
                    :value="old('cantidad_instructores', $programa->cantidad_instructores)" />
            </div>

            {{-- Detalle instructores --}}
            <div class="mb-4">
                <flux:textarea 
                    name="detalle_instructores" 
                    label="Detalle de instructores" 
                    rows="3"
                >{{ old('detalle_instructores', $programa->detalle_instructores) }}</flux:textarea>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-2 mt-6">
                <a href="{{ route('admin.programas.index') }}">
                    <flux:button variant="outline" type="button">Cancelar</flux:button>
                </a>
                <flux:button type="submit" variant="primary">Actualizar Programa</flux:button>
            </div>
        </form>
    </div>
</x-layouts.app>
