<x-layouts.app :title="__('Editar Instructivo')">
    <div class="max-w-xl mx-auto py-6">
        <form action="{{ route('admin.instructivos.update', $instructivo) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo', $instructivo->titulo) }}" required class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Enlace</label>
                <input type="url" name="enlace" value="{{ old('enlace', $instructivo->enlace) }}" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Estado</label>
                <input type="checkbox" name="estado" value="1" {{ $instructivo->estado ? 'checked' : '' }}>
                <span class="ml-2">Activo</span>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Orden</label>
                <input type="number" name="orden" value="{{ old('orden', $instructivo->orden) }}" class="w-full border rounded px-3 py-2">
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Actualizar</button>
        </form>
    </div>
</x-layouts.app>