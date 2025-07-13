<x-layouts.app :title="__('Instructivos')">
    {{-- Breadcrumb --}}
    <div class="mb-4 flex justify-between items-center px-8">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Inicio</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.instructivos.index')">Reglamento</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="">Listado</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    {{-- Título y botón --}}
    <div class="px-8 mb-10">
        <h1 class="text-4xl font-extrabold text-center text-zinc-800 dark:text-white mb-6">
            Reglamento
        </h1>

        <div class="flex justify-end">
            <a href="{{ route('admin.reglamentos.create') }}"
               class="bg-zinc-900 hover:bg-zinc-800 text-white font-semibold text-sm px-5 py-2 rounded-xl shadow transition">
                Nuevo Instructivo
            </a>
        </div>
    </div>

    {{-- Listado de reglamentos --}}
    <div class="px-8 space-y-24">
        @foreach ($reglamentos as $i => $reglamento)
            <div class="flex flex-col md:flex-row {{ $i % 2 === 0 ? '' : 'md:flex-row-reverse' }} items-center gap-10">
                {{-- Ícono --}}
                @if ($reglamento->icono)
                    <img src="{{ asset('storage/' . $reglamento->icono) }}" alt="Ícono" class="w-40 h-40 object-contain">
                @endif

                {{-- Contenido --}}
                <div class="max-w-xl">
                    <div class="flex items-baseline gap-3 mb-2">
                        <span class="text-green-700 text-4xl font-black">
                            {{ toRoman($i + 1) }}
                        </span>
                        <h2 class="text-3xl font-extrabold text-zinc-900 dark:text-white leading-tight">
                            {{ ucfirst($reglamento->titulo) }}
                        </h2>
                    </div>

                    <p class="text-zinc-700 dark:text-zinc-200 text-lg leading-relaxed mb-6">
                        {{ $reglamento->descripcion }}
                    </p>

                    <div class="flex gap-4">
                        <a href="{{ route('admin.reglamentos.edit', $reglamento) }}"
                           class="bg-zinc-800 hover:bg-zinc-700 text-white font-medium px-5 py-2 rounded-md transition">
                            Editar
                        </a>
                        <form action="{{ route('admin.reglamentos.destroy', $reglamento) }}" method="POST"
                              onsubmit="return confirm('¿Estás seguro de eliminar este reglamento?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-zinc-200 hover:bg-zinc-300 text-zinc-800 font-medium px-5 py-2 rounded-md transition">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layouts.app>

{{-- Helper para convertir a número romano --}}
@php
function toRoman($number)
{
    $map = [
        'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
        'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
        'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
    ];
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if ($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}
@endphp
