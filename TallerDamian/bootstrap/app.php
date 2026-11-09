<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

/*
| Arranque de TallerDamian.
| Aqui se indica donde estan las rutas, que no hay middleware propio
| y cuando un error debe responder en JSON.
*/
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // Pantallas, formularios y las consultas del taller
        web: __DIR__.'/../routes/web.php',
        // Comandos que se ejecutan con php artisan
        commands: __DIR__.'/../routes/console.php',
        // Direccion para comprobar que la aplicacion responde
        health: '/estado',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // No se agrega middleware nuevo.
        // El permiso de admin o cliente se revisa dentro de cada controlador.
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Si la ruta empieza por api o el navegador pide JSON, el error sale en JSON.
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
