<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $email = '';

    /**
     * Enviar un enlace de restablecimiento de contraseña al correo proporcionado.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('Si la cuenta existe, se enviará un enlace para restablecer la contraseña.'));
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header 
        :title="__('¿Olvidaste tu contraseña?')" 
        :description="__('Ingresa tu correo electrónico y te enviaremos un enlace para restablecerla.')" 
    />

    <!-- Estado de la sesión -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Dirección de correo electrónico -->
        <flux:input
            wire:model="email"
            :label="__('Correo electrónico')"
            type="email"
            required
            autofocus
            placeholder="correo@ejemplo.com"
            viewable
        />

        <flux:button variant="primary" type="submit" class="w-full">
            {{ __('Enviar enlace de restablecimiento') }}
        </flux:button>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
        {{ __('O también puedes volver al') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('inicio de sesión') }}</flux:link>
    </div>
</div>
