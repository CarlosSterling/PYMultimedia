<?php

use App\Http\Controllers\Admin\AreasController;
use App\Http\Controllers\Admin\ConveniosController;
use App\Http\Controllers\Admin\ProgramasController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::patch('admin/convenios/{convenio}/estado', [ConveniosController::class, 'toggleEstado'])
    ->name('admin.convenios.toggleEstado');

Route::put('/admin/areas/{area}/estado', [AreasController::class, 'toggleEstado'])->name('admin.areas.estado');

Route::resource('admin/programas', ProgramasController::class);



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
