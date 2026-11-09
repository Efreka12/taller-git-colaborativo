<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Parqueadero\ParqueaderoController;
use App\Http\Controllers\Users\UsersController;
use Illuminate\Support\Facades\Route;

// Pantalla de ingreso. Tambien es la ruta con nombre "login".
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Crear cuenta.
Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'registro']);

// Listado de usuarios del taller anterior.
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Parqueadero: tabla, registro de vehiculo, salida y eliminar.
Route::get('/parqueadero', [ParqueaderoController::class, 'index'])->name('parqueadero');
Route::get('/parqueadero/crear', [ParqueaderoController::class, 'crear'])->name('parqueadero.crear');
Route::post('/parqueadero', [ParqueaderoController::class, 'guardar']);
Route::get('/parqueadero/{id}/salida', [ParqueaderoController::class, 'salida'])->name('parqueadero.salida');
Route::post('/parqueadero/{id}/salida', [ParqueaderoController::class, 'actualizarSalida']);
Route::post('/parqueadero/{id}/eliminar', [ParqueaderoController::class, 'eliminar'])->name('parqueadero.eliminar');

// Consultas que responden JSON.
Route::get('/usuarios', [UsersController::class, 'getUsers']);
Route::get('/usuarios/{id}', [UsersController::class, 'getUsersFindById']);

// Formularios de editar, guardar y eliminar.
Route::get('/usuarios/{id}/editar', [UsersController::class, 'editar'])->name('usuarios.editar');
Route::post('/usuarios/{id}/actualizar', [UsersController::class, 'actualizar'])->name('usuarios.actualizar');
Route::post('/usuarios/{id}/eliminar', [UsersController::class, 'eliminar'])->name('usuarios.eliminar');
