<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\Parqueadero\ParqueaderoController;
use Illuminate\Support\Facades\Route;

// Pantalla de ingreso.
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Crear cuenta.
Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'registro']);

// Tabla del parqueadero, alta, salida y eliminar.
Route::get('/parqueadero', [ParqueaderoController::class, 'index'])->name('parqueadero');
Route::get('/parqueadero/crear', [ParqueaderoController::class, 'crear'])->name('parqueadero.crear');
Route::post('/parqueadero', [ParqueaderoController::class, 'guardar']);
Route::get('/parqueadero/{id}/salida', [ParqueaderoController::class, 'salida'])->name('parqueadero.salida');
Route::post('/parqueadero/{id}/salida', [ParqueaderoController::class, 'actualizarSalida']);
Route::post('/parqueadero/{id}/eliminar', [ParqueaderoController::class, 'eliminar'])->name('parqueadero.eliminar');
