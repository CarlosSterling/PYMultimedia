<x-layouts.app :title="__('Editar Convenio')">
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.convenios.index')">Convenios</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="">Editar</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded">
        <form action="{{ route('admin.convenios.update', $convenio) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Nombre --}}
            <div class="mb-4">
                <flux:input 
                    type="text" 
                    name="nombre" 
                    label="Nombre del convenio" 
                    :value="old('nombre', $convenio->nombre)" 
                    placeholder="Ingrese el nombre del convenio" 
                    required 
                    class="w-full"
                />
            </div>

            {{-- Logo actual --}}
            <div class="mb-4">
                <label class="block font-bold mb-1">Logo actual</label>
                @if($convenio->logo)
                    <img src="{{ asset('storage/' . $convenio->logo) }}" class="w-20 h-20 object-cover rounded mb-2">
                @else
                    <p class="text-gray-500">No hay logo cargado.</p>
                @endif
            </div>

            {{-- Nuevo logo --}}
            <div class="mb-4">
                <flux:input 
                    type="file" 
                    name="logo" 
                    label="Cambiar logo" 
                    accept="image/*"
                    class="w-full"
                />
            </div>

            {{-- Enlace --}}
            <div class="mb-4">
                <flux:input 
                    type="url" 
                    name="enlace" 
                    label="Enlace" 
                    :value="old('enlace', $convenio->enlace)" 
                    placeholder="https://www.sena.edu.co"
                    class="w-full"
                />
            </div>


            {{-- Botón de acción --}}
            <div class="flex justify-end gap-2 mt-6">
                <a href="{{ route('admin.convenios.index') }}">
                    <flux:button variant="outline" type="button">Cancelar</flux:button>
                </a>
                

                <flux:button variant="primary" type="submit">Guardar Área</flux:button>
            </div>
</x-layouts.app>


<footer class="fixed bottom-0 left-0 w-full z-[-1]">
    <img 
        src="{{ asset('images/footer-shape.png') }}" 
        alt="Decoración inferior" 
        class="w-full h-[100px] object-cover md:h-[100px] lg:h-[350px]"
    >
</footer>