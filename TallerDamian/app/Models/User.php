<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;

// Columnas que create() y update() pueden guardar.
#[Fillable(['name', 'email', 'password', 'role'])]
// Estas columnas no salen cuando el usuario se convierte a JSON.
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // La contraseña se encripta con bcrypt() en el controlador.
    // No se vuelve a encriptar aqui, para que el login coincida.
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    // Revisa si la columna role vale admin.
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
