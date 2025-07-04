<x-layouts.app :title="__('Nueva Área')">

    {{-- Encabezado y navegación --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.areas.index')">Áreas</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="">Crear</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded">

        <form action="{{ route('admin.areas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nombre --}}
            <div class="mb-4">
                <flux:input 
                    type="text" 
                    name="nombre" 
                    label="Nombre del área" 
                    :value="old('nombre')" 
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
                    required>{{ old('descripcion') }}</flux:textarea>
            </div>

            {{-- Imagen --}}
            <div class="mb-4">
                <flux:input 
                    type="file" 
                    name="imagen" 
                    label="Imagen representativa" 
                    accept="image/*" 
                    required 
                    class="w-full" />
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-2 mt-6">
                <a href="{{ route('admin.areas.index') }}">
                    <flux:button variant="outline" type="button">Cancelar</flux:button>
                </a>

                <flux:button variant="primary" type="submit">Guardar Área</flux:button>
            </div>
        </form>

    </div>
</x-layouts.app>
