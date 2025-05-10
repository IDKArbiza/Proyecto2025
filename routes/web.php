<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetalleObligacionController;
use App\Http\Controllers\TipoObligacionController;
use App\Http\Controllers\ReservaInsumoController;
use App\Livewire\Auth\Login;

Route::get('/', Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->middleware('role:administrador')->name('admin.dashboard');
    Route::get('/cajero/dashboard', fn() => view('cajero.dashboard'))->middleware('role:cajero')->name('cajero.dashboard');
    Route::get('/usuario/dashboard', fn() => view('usuario.dashboard'))->middleware('role:usuario')->name('usuario.dashboard');
});
