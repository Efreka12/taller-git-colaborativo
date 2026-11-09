<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    // Devuelve todos los usuarios en JSON.
    public function getUsers()
    {
        $listado = User::all();

        return response()->json([$listado]);
    }

    // Devuelve un usuario segun el id de la ruta.
    public function getUsersFindById($id)
    {
        $registro = User::find($id);

        return response()->json([$registro]);
    }

    // Abre el formulario. Un cliente solo puede abrir el suyo.
    public function editar($id)
    {
        $cuentaActiva = Auth::user();

        if (! $cuentaActiva) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesion.');
        }

        if ($cuentaActiva->role !== 'admin' && $cuentaActiva->id != $id) {
            return redirect()->route('home')->with('error', 'No tienes permiso para editar este usuario.');
        }

        $registro = User::find($id);

        if (! $registro) {
            return redirect()->route('home')->with('error', 'Usuario no encontrado.');
        }

        return view('users.editar', ['registro' => $registro]);
    }

    // Actualiza nombre, correo y, si la escriben, la contraseña.
    public function actualizar(Request $request, $id)
    {
        $cuentaActiva = Auth::user();

        if (! $cuentaActiva) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesion.');
        }

        if ($cuentaActiva->role !== 'admin' && $cuentaActiva->id != $id) {
            return redirect()->route('home')->with('error', 'Acción no autorizada.');
        }

        // La contraseña es opcional. Si llega, debe tener al menos 6 caracteres.
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $registro = User::find($id);

        if (! $registro) {
            return redirect()->route('home')->with('error', 'Usuario no encontrado.');
        }

        $camposEditados = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // filled confirma que el campo de contraseña trae texto.
        if ($request->filled('password')) {
            $camposEditados['password'] = bcrypt($request->password);
        }

        $registro->update($camposEditados);

        return redirect()->back()->with('success', 'Usuario actualizado correctamente');
    }

    // Un admin puede borrar otra cuenta. Nadie puede borrar la propia.
    public function eliminar($id)
    {
        $cuentaActiva = Auth::user();

        if (! $cuentaActiva) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesion.');
        }

        if ($cuentaActiva->id == $id) {
            return redirect()->route('home')->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        if ($cuentaActiva->role !== 'admin') {
            return redirect()->route('home')->with('error', 'Solo los administradores pueden eliminar usuarios.');
        }

        $registro = User::find($id);

        if ($registro) {
            $registro->delete();
        }

        return redirect()->route('home')->with('success', 'Usuario eliminado correctamente');
    }
}
