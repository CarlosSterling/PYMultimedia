<x-layouts.app :title="__('Instructivos')">

    {{-- Breadcrumb --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.instructivos.index')">Instructivos</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="">Listado</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    {{-- Título y botón --}}
    <div class="max-w-5xl mx-auto px-6 mb-10">
        <h1 class="text-3xl font-bold text-center text-zinc-800 dark:text-white mb-6">
            Instructivos
        </h1>

        <div class="flex justify-end">
            <a href="{{ route('admin.instructivos.create') }}"
               class="bg-zinc-900 hover:bg-zinc-800 text-white font-semibold text-sm px-5 py-2 rounded shadow transition">
                Nuevo Instructivo
            </a>
        </div>
    </div>

    {{-- Listado de instructivos --}}
    <div class="max-w-5xl mx-auto space-y-3 mb-24">
        @foreach ($instructivos as $item)
            <div class="flex items-center justify-between bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded px-4 py-3 shadow-sm hover:bg-zinc-50 dark:hover:bg-zinc-800 transition">
                <div class="flex items-center gap-3">
                    <span class="h-3 w-3 bg-green-600 rounded-full"></span>
                    <a href="{{ $item->enlace }}" target="_blank" class="text-base font-medium hover:underline text-zinc-800 dark:text-white">
                        {{ $item->titulo }}
                    </a>
                </div>

                <div class="flex items-center gap-2">
                    {{-- Botón Editar --}}
                    <a href="{{ route('admin.instructivos.edit', $item) }}"
                       class="bg-zinc-800 hover:bg-zinc-700 text-white text-sm font-medium px-4 py-1.5 rounded transition">
                        Editar
                    </a>

                    {{-- Botón Eliminar --}}
                    <form action="{{ route('admin.instructivos.destroy', $item) }}" method="POST"
                          onsubmit="return confirm('¿Estás seguro de que deseas eliminar este instructivo?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-zinc-800 hover:bg-zinc-700 text-white text-sm font-medium px-4 py-1.5 rounded transition">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Paginación --}}
    <div class="mt-8 flex justify-center">
        {{ $instructivos->links() }}
    </div>

    {{-- Footer flotante institucional --}}
    <footer class="fixed bottom-6 left-[17.5rem] w-[calc(100%-18.5rem)] z-40">
        <div class="bg-gray-100 dark:bg-zinc-800 rounded-lg px-6 py-4 shadow-md flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-base font-semibold text-center md:text-left text-black dark:text-white">
                ¿Necesitas más información o tienes preguntas sobre estudiar en el SENA?
            </p>
            <a href="#"
               class="bg-green-600 hover:bg-green-700 text-white font-bold text-sm px-6 py-2 rounded-md transition text-center">
                Resuelve tus dudas aquí
            </a>
        </div>
    </footer>

</x-layouts.app>
