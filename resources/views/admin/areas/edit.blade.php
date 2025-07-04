<x-layouts.app :title="__('Editar Área')">

    {{-- Encabezado y navegación --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.areas.index')">Áreas</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="">Editar</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded">

        <form action="{{ route('admin.areas.update', $area) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Nombre --}}
            <div class="mb-4">
                <flux:input 
                    type="text" 
                    name="nombre" 
                    label="Nombre del área" 
                    :value="old('nombre', $area->nombre)" 
                    placeholder="Ingrese el nombre del área" 
                    required 
                    class="w-full" />
            </div>

            {{-- Descripción --}}
            <div class="mb-4">
                <flux:textarea 
                    name="descripcion" 
                    label="Descripción" 
                    placeholder="Ingrese una descripción para el área" 
                    rows="4"
                    required>{{ old('descripcion', $area->descripcion) }}</flux:textarea>
            </div>

            {{-- Imagen actual --}}
            @if ($area->imagen)
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Imagen actual</label>
                    <img src="{{ asset('storage/' . $area->imagen) }}" alt="Imagen actual"
                        class="w-48 h-auto rounded shadow border">
                </div>
            @endif

            {{-- Cambiar imagen --}}
            <div class="mb-4">
                <flux:input 
                    type="file" 
                    name="imagen" 
                    label="Cambiar imagen" 
                    accept="image/*" 
                    class="w-full" />
            </div>

            {{-- Estado --}}
            <div class="mb-4">
                <flux:checkbox 
                    name="estado" 
                    label="Área activa" 
                    :checked="old('estado', $area->estado) == 1"
                />
            </div>

            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-2 mt-6">
                <a href="{{ route('admin.areas.index') }}">
                    <flux:button variant="outline" type="button">Cancelar</flux:button>
                </a>

                <flux:button variant="primary" type="submit">Actualizar Área</flux:button>
            </div>
        </form>

    </div>
</x-layouts.app>
