<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetalleObligacionController;
use App\Http\Controllers\TipoObligacionController;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('detalle_obligaciones', DetalleObligacionController::class);
Route::resource('insumos', \App\Http\Controllers\InsumoController::class);
Route::resource('tipo_obligaciones', TipoObligacionController::class)
    ->parameters(['tipo_obligaciones' => 'tipo_obligacion']);
Route::resource('alumnos', \App\Http\Controllers\AlumnoController::class);

