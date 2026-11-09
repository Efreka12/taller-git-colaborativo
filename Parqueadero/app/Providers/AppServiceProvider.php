<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Se ejecuta al arrancar. En este proyecto no se registra ningun servicio.
     */
    public function register(): void
    {
        //
    }

    /**
     * Se ejecuta cuando la aplicacion ya esta lista.
     */
    public function boot(): void
    {
        //
    }
}
