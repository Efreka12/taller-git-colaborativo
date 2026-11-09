<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Users\UsersController;
use Illuminate\Support\Facades\Route;

// Pantalla de ingreso. Tambien es la ruta con nombre "login".
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Crear cuenta.
Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'registro']);

// Listado despues de entrar. La ruta se llama "home".
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Consultas que responden JSON.
Route::get('/usuarios', [UsersController::class, 'getUsers']);
Route::get('/usuarios/{id}', [UsersController::class, 'getUsersFindById']);

// Formularios de editar, guardar y eliminar.
Route::get('/usuarios/{id}/editar', [UsersController::class, 'editar'])->name('usuarios.editar');
Route::post('/usuarios/{id}/actualizar', [UsersController::class, 'actualizar'])->name('usuarios.actualizar');
Route::post('/usuarios/{id}/eliminar', [UsersController::class, 'eliminar'])->name('usuarios.eliminar');
