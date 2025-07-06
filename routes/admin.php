<?php

use App\Http\Controllers\Admin\ConveniosController;
use App\Http\Controllers\Admin\AreasController;
use App\Http\Controllers\Admin\ProgramasController;
use Illuminate\Support\Facades\Route;

Route::patch('convenios/{convenio}/estado', [ConveniosController::class, 'toggleEstado'])
    ->name('convenios.toggleEstado');

Route::put('areas/{area}/estado', [AreasController::class, 'toggleEstado'])
    ->name('areas.estado');

Route::resource('convenios', ConveniosController::class);
Route::resource('areas', AreasController::class);
Route::resource('programas', ProgramasController::class);

Route::get('programas/area/{area}', [ProgramasController::class, 'porArea'])
    ->name('programas.porArea');
