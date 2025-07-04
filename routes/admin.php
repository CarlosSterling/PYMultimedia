<?php

use App\Http\Controllers\Admin\ConveniosController;
use App\Http\Controllers\Admin\AreasController;
use Illuminate\Support\Facades\Route;

Route::resource('convenios', ConveniosController::class);
Route::resource('areas', AreasController::class);

