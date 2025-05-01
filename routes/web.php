<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetalleObligacionController;
use App\Http\Controllers\TipoObligacionController;
use App\Http\Controllers\ReservaInsumoController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('detalle_obligaciones', DetalleObligacionController::class);
Route::resource('insumos', \App\Http\Controllers\InsumoController::class);
Route::resource('tipo_obligaciones', TipoObligacionController::class)
    ->parameters(['tipo_obligaciones' => 'tipo_obligacion']);
Route::resource('alumnos', \App\Http\Controllers\AlumnoController::class);
Route::resource('reserva_insumo', ReservaInsumoController::class)
    ->parameters(['reserva_insumo' => 'reserva_insumo']);
