<x-layouts.app :title="__('Instructivos')">

    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.instructivos.index')">Instructivos</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="">Listado</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="px-8 mb-10">
        <h1 class="text-4xl font-extrabold text-center text-zinc-800 mb-6">
            Instructivos
        </h1>

        <div class="flex justify-end">
            <a href="{{ route('admin.instructivos.create') }}"
               class="bg-zinc-900 text-white font-semibold text-sm px-5 py-2 rounded-xl shadow hover:bg-zinc-800 transition">
                Nuevo Instructivo
            </a>
        </div>
    </div>

    <div class="max-w-5xl mx-auto grid gap-2">
        @foreach ($instructivos as $item)
            <div class="flex items-center justify-between border border-green-600 rounded px-4 py-3 hover:bg-green-50">
                <div class="flex items-center gap-2">
                    <span class="h-3 w-3 bg-green-600 rounded-full"></span>
                    <a href="{{ $item->enlace }}" target="_blank" class="text-lg font-medium hover:underline">
                        {{ $item->titulo }}
                    </a>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.instructivos.edit', $item) }}"
                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-1.5 rounded shadow-sm transition">
                        Editar
                    </a>

                    <form action="{{ route('admin.instructivos.destroy', $item) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este instructivo?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-block bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-4 py-1.5 rounded shadow-sm transition">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Paginación --}}
    <div class="mt-6 flex justify-center">
        {{ $instructivos->links() }}
    </div>

    {{-- Footer Fijo SOLO en esta página --}}
    <footer class="fixed bottom-6 left-[17.5rem] w-[calc(100%-18.5rem)] z-40">
        <div class="bg-gray-200 rounded-lg px-6 py-4 shadow-md flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-base font-semibold text-center md:text-left text-black">
                ¿Necesitas más información o tienes preguntas sobre estudiar en el SENA?
            </p>
            <a href="#"
               class="bg-green-500 hover:bg-green-600 text-white font-bold text-sm px-6 py-2 rounded-md transition text-center">
                Resuelve tus dudas aquí
            </a>
        </div>
    </footer>

</x-layouts.app>
