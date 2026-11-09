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

    // Guarda el usuario. Este proyecto no usa roles.
    public function registro(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('registro')->with('success', 'La cuenta fue registrada. Ya puedes iniciar sesion.');
    }
}
