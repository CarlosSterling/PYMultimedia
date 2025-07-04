<x-layouts.app :title="__('Crear Convenio')">
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.convenios.index')">Convenios</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="">Nuevo</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded">
        <form action="{{ route('admin.convenios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nombre --}}
            <div class="mb-4">
                <flux:input 
                    label="Nombre del convenio" 
                    name="nombre" 
                    id="nombre" 
                    required 
                    placeholder="Ingrese el nombre del convenio" 
                    class="w-full"
                />
            </div>

            {{-- Logo --}}
            <div class="mb-4">
                <flux:input 
                    type="file" 
                    label="Logo" 
                    name="logo" 
                    id="logo" 
                    accept="image/*" 
                    class="w-full"
                />
            </div>

            {{-- Enlace --}}
            <div class="mb-4">
                <flux:input 
                    type="url" 
                    label="Enlace" 
                    name="enlace" 
                    id="enlace" 
                    placeholder="https://www.sena.edu.co" 
                    class="w-full"
                />
            </div>


            {{-- Botón --}}
            <div class="flex justify-end gap-2 mt-6">
                <a href="{{ route('admin.areas.index') }}">
                    <flux:button variant="outline" type="button">Cancelar</flux:button>
                </a>
                

                <flux:button variant="primary" type="submit">Guardar Área</flux:button>
            </div>
        </form>
    </div>
</x-layouts.app>
<footer class="fixed bottom-0 left-0 w-full z-[-1]">
    <img 
        src="{{ asset('images/footer-shape.png') }}" 
        alt="Decoración inferior" 
        class="w-full h-[100px] object-cover md:h-[100px] lg:h-[350px]"
    >
</footer>


