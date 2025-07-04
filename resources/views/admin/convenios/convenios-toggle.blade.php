<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $convenio->id }}</td>
                    <td class="px-6 py-4">{{ $convenio->nombre }}</td>
                    <td class="px-6 py-4">
                        @if ($convenio->logo)
                            <img src="{{ asset('storage/' . $convenio->logo) }}" class="w-16 h-16 object-cover rounded-full">
                        @else
                            No Logo
                        @endif
                    </td>

                    {{-- TOGGLE sin salto visual y sin recarga --}}
                    <td class="px-6 py-4">
                        <label class="inline-flex items-center cursor-pointer relative w-11 h-6">
                            <input type="checkbox"
                                   wire:click="toggleEstado({{ $convenio->id }})"
                                   class="sr-only peer"
                                   {{ $convenio->estado ? 'checked' : '' }}>

                            <div class="w-11 h-6 bg-red-500 peer-checked:bg-green-600 rounded-full 
                                        transition-colors duration-300 peer-focus:outline-none peer-focus:ring-2 
                                        peer-focus:ring-green-500"></div>

                            <div class="absolute top-0.5 left-0.5 w-5 h-5 bg-white border border-gray-300 rounded-full 
                                        transition-transform duration-300 peer-checked:translate-x-full"></div>
                        </label>
                    </td>

                    <td class="px-6 py-4">
                        @if ($convenio->enlace)
                            <a href="{{ $convenio->enlace }}" target="_blank"
                                class="inline-block bg-green-600 text-white text-xs px-3 py-1 rounded-full hover:bg-green-700">
                                Ver más
                            </a>
                        @else
                            <span class="text-gray-400">Sin enlace</span>
                        @endif
                    </td>

                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('admin.convenios.edit', $convenio) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('admin.convenios.destroy', $convenio) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar este convenio?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
