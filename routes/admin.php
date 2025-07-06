<?php

use App\Http\Controllers\Admin\ConveniosController;
use App\Http\Controllers\Admin\AreasController;
use App\Http\Controllers\Admin\ProgramasController;
use Illuminate\Support\Facades\Route;

Route::resource('convenios', ConveniosController::class);
Route::resource('areas', AreasController::class);
Route::resource('programas', ProgramasController::class);

