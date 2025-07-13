<x-layouts.app :title="__('Convenios')">
    {{-- Breadcrumb --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Convenios</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">Listado</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <a href="{{ route('admin.convenios.create') }}">
            <flux:button variant="primary" type="button" class="m-4">Nuevo Convenio</flux:button>
        </a>
    </div>

    {{-- Tabla de convenios --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-7xl mx-auto bg-white dark:bg-zinc-900">
        <table class="w-full text-sm text-left text-gray-700 dark:text-zinc-200">
            <thead class="text-xs uppercase bg-gray-100 dark:bg-zinc-800">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Convenio</th>
                    <th class="px-6 py-3">Logo</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3">Enlace</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($convenios as $convenio)
                    <tr class="border-b dark:border-zinc-700">
                        <td class="px-6 py-4 font-medium text-zinc-900 dark:text-white">{{ $convenio->id }}</td>
                        <td class="px-6 py-4">{{ $convenio->nombre }}</td>
                        <td class="px-6 py-4">
                            @if ($convenio->logo)
                                <img src="{{ asset('storage/' . $convenio->logo) }}" class="w-16 h-16 object-cover rounded-full">
                            @else
                                <span class="text-zinc-400">Sin logo</span>
                            @endif
                        </td>

                        {{-- Estado (toggle sin salto) --}}
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.convenios.toggleEstado', $convenio) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <label class="inline-flex items-center cursor-pointer relative w-11 h-6">
                                    <input type="checkbox" name="estado" onchange="this.form.submit()"
                                           class="sr-only peer" {{ $convenio->estado ? 'checked' : '' }}>

                                    <div class="w-11 h-6 bg-zinc-400 peer-checked:bg-green-600 rounded-full transition-colors duration-300"></div>

                                    <div class="absolute top-0.5 left-0.5 w-5 h-5 bg-white border rounded-full transition-transform duration-300 peer-checked:translate-x-full"></div>
                                </label>
                            </form>
                        </td>

                        {{-- Enlace --}}
                        <td class="px-6 py-4">
                            @if ($convenio->enlace)
                                <a href="{{ $convenio->enlace }}" target="_blank"
                                   class="inline-block bg-green-600 hover:bg-green-700 text-white text-xs font-medium px-3 py-1 rounded transition">
                                    Ver más
                                </a>
                            @else
                                <span class="text-zinc-400">Sin enlace</span>
                            @endif
                        </td>

                        {{-- Acciones --}}
                        <td class="px-6 py-4 flex flex-col md:flex-row md:items-center md:space-x-2 space-y-2 md:space-y-0">
                            <a href="{{ route('admin.convenios.edit', $convenio) }}"
                               class="inline-block bg-zinc-200 hover:bg-zinc-300 text-zinc-800 text-xs font-medium px-4 py-1 rounded transition">
                                Editar
                            </a>

                            <form action="{{ route('admin.convenios.destroy', $convenio) }}" method="POST"
                                  onsubmit="return confirm('¿Deseas eliminar este convenio?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-block bg-zinc-200 hover:bg-zinc-300 text-zinc-800 text-xs font-medium px-4 py-1 rounded transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Footer decorativo --}}
    <footer class="fixed bottom-0 left-0 w-full z-[-1]">
        <img src="{{ asset('images/footer-shape.png') }}" alt="Decoración inferior"
             class="w-full h-[100px] object-cover md:h-[100px] lg:h-[350px]">
    </footer>
</x-layouts.app>
