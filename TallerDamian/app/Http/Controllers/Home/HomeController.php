<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Lista los usuarios de la base, menos el id y el correo ocultos.
    public function index()
    {
        $cuentaActiva = Auth::user();

        if (! $cuentaActiva) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesion para ver esta pagina.');
        }

        // Oculta un solo id y un solo correo.
        $listaUsuarios = User::where('id', '!=', 99)
            ->where('email', '!=', 'lope@gmail.com')
            ->get();

        // Para ocultar varios id se puede usar whereNotIn:
        // $idsOcultos = [1, 3, 5];
        // $listaUsuarios = User::whereNotIn('id', $idsOcultos)->get();

        // Para ocultar varios correos:
        // $correosOcultos = ['admin@gmail.com', 'prueba@gmail.com'];
        // $listaUsuarios = User::whereNotIn('email', $correosOcultos)->get();

        return view('home.index', [
            'saludo' => 'Bienvenida(o) ' . $cuentaActiva->name,
            'listado' => $listaUsuarios,
        ]);
    }
}
