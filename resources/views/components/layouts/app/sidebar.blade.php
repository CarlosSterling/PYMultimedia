<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">

    @php
    $groups = [
        'Menú' => [
            [
                'name' => 'Inicio',
                'icon' => 'home',
                'url' => route('dashboard'),
                'current' => request()->routeIs('dashboard.*'),
            ],
            [
                'name' => 'Usuarios',
                'icon' => 'user-group',
                'url' => route('admin.users.index'),
                'current' => request()->routeIs('admin.users.*'),
            ],
            [
                'name' => 'Areas',
                'icon' => 'presentation-chart-bar',
                'url' => route('admin.areas.index'),
                'current' => request()->routeIs('admin.areas.*'),
            ],
            [
                'name' => 'Programas',
                'icon' => 'academic-cap',
                'submenu' => \App\Models\Areas::where('estado', true)->get()->map(function ($area) {
                    return [
                        'name' => $area->nombre,
                        'icon' => 'chevron-right',
                        'url' => url('/admin/programas/area/' . $area->id),
                    ];
                })->toArray(),
            ],
            [
                'name' => 'Convenios',
                'icon' => 'archive-box',
                'url' => route('admin.convenios.index'),
                'current' => request()->routeIs('admin.convenios.*'),
            ],
            [
                'name' => 'Mapa',
                'icon' => 'map',
                'url' => route('dashboard'),
                'current' => request()->routeIs('dashboard.*'),
            ],
            [
                'name' => 'Reglamento',
                'icon' => 'book-open',
                'url' => route('admin.reglamentos.index'),
                'current' => request()->routeIs('admin.reglamentos.*'),
            ],
            [
                'name' => 'Instructivos',
                'icon' => 'square-3-stack-3d',
                'url' => route('admin.instructivos.index'),
                'current' => request()->routeIs('admin.instructivos.*'),
            ],
            [
                'name' => 'Beneficios',
                'icon' => 'banknotes',
                'url' => route('dashboard'),
                'current' => request()->routeIs('dashboard.*'),
            ],
            [
                'name' => 'Casos de Éxito',
                'icon' => 'user-group',
                'url' => route('dashboard'),
                'current' => request()->routeIs('dashboard.*'),
            ],
        ],
    ];
@endphp

    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            @foreach ($groups as $group => $items)
                <flux:navlist.group :heading="$group" class="grid">
                    @foreach ($items as $item)
                        @if (isset($item['submenu']))
                            <!-- Ítem con submenú -->
                            <div x-data="{ open: false }">
                                <flux:navlist.item :icon="$item['icon']" @click="open = !open" class="cursor-pointer">
                                    {{ $item['name'] }}
                                </flux:navlist.item>
        
                                <div x-show="open" x-transition class="ml-6 mt-1 space-y-1">
                                    @foreach ($item['submenu'] as $subitem)
                                        <flux:navlist.item
                                            :icon="$subitem['icon']"
                                            :href="$subitem['url']"
                                            :current="request()->url() === $subitem['url']"
                                            wire:navigate
                                        >
                                            {{ $subitem['name'] }}
                                        </flux:navlist.item>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <!-- Ítem simple -->
                            <flux:navlist.item
                                :icon="$item['icon']"
                                :href="$item['url']"
                                :current="$item['current']"
                                wire:navigate
                            >
                                {{ $item['name'] }}
                            </flux:navlist.item>
                        @endif
                    @endforeach
                </flux:navlist.group>
            @endforeach
        </flux:navlist>
        

        <flux:spacer />


        <!-- Desktop User Menu -->
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile :name="auth() -> user() -> name" :initials="auth() -> user() -> initials()"
                icon:trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Ajustes') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Cerrar Sesión') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth() -> user() -> initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Ajustes') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Cerrar Sesión') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>