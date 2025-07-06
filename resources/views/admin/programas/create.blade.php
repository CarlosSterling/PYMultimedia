<x-layouts.app :title="__('Crear Programa')">
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.programas.index')">Programas</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Crear</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded">
        <form method="POST" action="{{ route('admin.programas.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <flux:input 
                    name="nombre_programa" 
                    label="Nombre del programa"
                    placeholder="Ingrese el nombre del programa"
                    :value="old('nombre_programa')"
                    required />
            </div>

            <div class="mb-4">
                <label for="area_id" class="block font-semibold mb-1">Área</label>
                <select name="area_id" id="area_id" class="w-full rounded border-gray-300 dark:bg-zinc-800 dark:text-white">
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <flux:textarea 
                    name="descripcion_programa" 
                    label="Descripción del programa"
                    placeholder="Describa brevemente el programa"
                    rows="4"
                >{{ old('descripcion_programa') }}</flux:textarea>
            </div>

            {{-- Imagen del programa usando input estándar para evitar errores de componente --}}
            <div class="mb-4">
                <label for="imagen" class="block font-semibold mb-1">Imagen del programa</label>
                <input type="file" name="imagen" id="imagen" accept="image/*"
                       class="w-full rounded border-gray-300 dark:bg-zinc-800 dark:text-white">
            </div>

            <div class="mb-4">
                <flux:input 
                    name="instructor_lider" 
                    label="Instructor líder"
                    placeholder="Nombre del instructor líder"
                    :value="old('instructor_lider')" />
            </div>

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

            <div class="mb-4">
                <flux:input 
                    name="implementos_requeridos" 
                    label="Implementos requeridos"
                    placeholder="Uniformes, herramientas, etc."
                    :value="old('implementos_requeridos')" />
            </div>

            <div class="mb-4">
                <flux:input 
                    type="number" 
                    name="cantidad_instructores" 
                    label="Cantidad de instructores"
                    :value="old('cantidad_instructores')" />
            </div>

            <div class="mb-4">
                <flux:textarea 
                    name="detalle_instructores" 
                    label="Detalle de instructores"
                    placeholder="Nombres, roles, etc."
                    rows="3"
                >{{ old('detalle_instructores') }}</flux:textarea>
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <a href="{{ route('admin.programas.index') }}">
                    <flux:button variant="outline" type="button">Cancelar</flux:button>
                </a>
                <flux:button type="submit" variant="primary">Guardar Programa</flux:button>
            </div>
        </form>
    </div>
</x-layouts.app>