<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetalleObligacionController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('detalle_obligaciones', DetalleObligacionController::class);
Route::resource('insumos', \App\Http\Controllers\InsumoController::class);
