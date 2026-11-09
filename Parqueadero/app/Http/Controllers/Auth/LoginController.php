<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Muestra la pantalla de ingreso.
    public function index()
    {
        return view('auth.login');
    }

    // Compara el correo y la contraseña con la tabla users.
    public function login(Request $request)
    {
        $datosIngreso = $request->only('email', 'password');

        if (Auth::attempt($datosIngreso)) {
            return redirect()->intended('parqueadero');
        }

        return redirect()->route('login')->with('error', 'Usuario o contraseña incorrectos');
    }
}
