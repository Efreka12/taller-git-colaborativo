<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Se ejecuta al arrancar, antes de boot.
     * Sirve para registrar servicios. En este taller no se registra ninguno.
     */
    public function register(): void
    {
        //
    }

    /**
     * Se ejecuta cuando la aplicacion ya esta lista.
     * Aqui se podria ajustar algo global. El taller lo deja vacio.
     */
    public function boot(): void
    {
        //
    }
}
