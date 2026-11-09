<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    // Muestra el formulario para crear una cuenta.
    public function index()
    {
        return view('auth.registro');
    }

    // Guarda el usuario y le asigna el perfil segun el correo.
    public function registro(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        // Si el correo trae la palabra admin, el perfil queda como admin.
        $perfilAsignado = str_contains($request->email, 'admin') ? 'admin' : 'cliente';

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $perfilAsignado,
        ]);

        return redirect()->route('registro')->with('success', 'El usuario ha sido registrado como: ' . $perfilAsignado);
    }
}
