<?php

namespace App\Http\Controllers\Parqueadero;

use App\Http\Controllers\Controller;
use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParqueaderoController extends Controller
{
    // Muestra la tabla de vehiculos. Hay que tener sesion, sin revisar roles.
    public function index()
    {
        $cuentaActiva = Auth::user();

        if (! $cuentaActiva) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesion para ver el parqueadero.');
        }

        $listado = Registro::all();

        return view('parqueadero.index', [
            'saludo' => 'Bienvenida(o) ' . $cuentaActiva->name,
            'listado' => $listado,
        ]);
    }

    // Formulario para anotar un carro o una moto.
    public function crear()
    {
        if (! Auth::user()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesion.');
        }

        return view('parqueadero.crear');
    }

    // Guarda la placa, el tipo y la hora de entrada.
    public function guardar(Request $request)
    {
        if (! Auth::user()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesion.');
        }

        $request->validate([
            'placa' => 'required',
            'tipo' => 'required',
        ]);

        if ($request->tipo !== 'moto' && $request->tipo !== 'carro') {
            return redirect()->back()->with('error', 'El tipo debe ser moto o carro.');
        }

        Registro::create([
            'placa' => $request->placa,
            'tipo' => $request->tipo,
            'hora_entrada' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('parqueadero')->with('success', 'Vehiculo registrado.');
    }

    // Pantalla para escribir la hora de salida.
    public function salida($id)
    {
        if (! Auth::user()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesion.');
        }

        $registro = Registro::find($id);

        if (! $registro) {
            return redirect()->route('parqueadero')->with('error', 'Registro no encontrado.');
        }

        return view('parqueadero.salida', [
            'registro' => $registro,
        ]);
    }

    // Calcula la tarifa y guarda la hora de salida.
    public function actualizarSalida(Request $request, $id)
    {
        if (! Auth::user()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesion.');
        }

        $request->validate([
            'hora_salida' => 'required',
        ]);

        $registro = Registro::find($id);

        if (! $registro) {
            return redirect()->route('parqueadero')->with('error', 'Registro no encontrado.');
        }

        $momentoEntrada = strtotime($registro->hora_entrada);
        $momentoSalida = strtotime($request->hora_salida);

        if ($momentoSalida <= $momentoEntrada) {
            return redirect()->back()->with('error', 'La hora de salida debe ser posterior a la de entrada.');
        }

        // La hora que ya empezo se cobra completa. Una estancia corta cobra 1 hora.
        $segundos = $momentoSalida - $momentoEntrada;
        $horasCobradas = (int) ceil($segundos / 3600);

        if ($horasCobradas < 1) {
            $horasCobradas = 1;
        }

        // Moto 3000 por hora. Carro 6000 por hora.
        $valorHora = $registro->tipo === 'moto' ? 3000 : 6000;
        $tarifaTotal = $horasCobradas * $valorHora;

        $registro->update([
            'hora_salida' => date('Y-m-d H:i:s', $momentoSalida),
            'tarifa_total' => $tarifaTotal,
        ]);

        return redirect()->route('parqueadero')->with('success', 'Salida registrada. Tarifa total: ' . $tarifaTotal);
    }

    // Quita el registro de la tabla.
    public function eliminar($id)
    {
        if (! Auth::user()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesion.');
        }

        $registro = Registro::find($id);

        if ($registro) {
            $registro->delete();
        }

        return redirect()->route('parqueadero')->with('success', 'Registro eliminado.');
    }
}
