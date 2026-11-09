<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

// Columnas que create() y update() pueden guardar.
#[Fillable(['placa', 'tipo', 'hora_entrada', 'hora_salida', 'tarifa_total'])]
class Registro extends Model
{
    //
}
