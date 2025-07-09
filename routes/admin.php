<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AreasController;
use App\Http\Controllers\Admin\ConveniosController;
use App\Http\Controllers\Admin\ProgramasController;

Route::middleware(['auth', 'verified', 'isAdmin'])
    ->group(function () {
        // Áreas
        Route::put('areas/{area}/estado', [AreasController::class, 'toggleEstado'])->name('areas.estado');
        Route::resource('areas', AreasController::class);

        // Convenios
        Route::patch('convenios/{convenio}/estado', [ConveniosController::class, 'toggleEstado'])->name('convenios.toggleEstado');
        Route::resource('convenios', ConveniosController::class);

        // Programas
        Route::get('programas/area/{area}', [ProgramasController::class, 'porArea'])->name('programas.porArea');
        Route::resource('programas', ProgramasController::class);

        
    });
