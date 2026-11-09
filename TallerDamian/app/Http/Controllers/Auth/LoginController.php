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
        // Solo se toman estos dos campos del formulario.
        $datosIngreso = $request->only('email', 'password');

        // attempt busca el usuario y revisa la contraseña guardada con bcrypt.
        if (Auth::attempt($datosIngreso)) {
            return redirect()->intended('home');
        }

        return redirect()->route('login')->with('error', 'Usuario o contraseña incorrectos');
    }
}
