<?php

namespace App\Http\Controllers;

use App\Models\Viatico; // Importa el modelo de Viático
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Importa correctamente la clase Controller

class ViaticosController extends Controller
{
    public function create()
    {
        return view('viaticos.create');
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'solicitante' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'dependencia' => 'required|string|max:255',
            'importe' => 'required|numeric',
            'concepto' => 'required|string|max:255',
            'cuenta' => 'required|digits_between:10,18',
            'clabe' => 'required|digits:18',
            'presupuesto' => 'required|numeric',
            'proyecto' => 'required|string|max:255',
            'beneficiario' => 'required|string|max:255',
            'documento' => 'required|string|max:255',
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
        ]);

        // Guardar los datos en la base de datos
        Viatico::create([
            'solicitante' => $request->solicitante,
            'puesto' => $request->puesto,
            'dependencia' => $request->dependencia,
            'importe' => $request->importe,
            'concepto' => $request->concepto,
            'cuenta' => $request->cuenta,
            'clabe' => $request->clabe,
            'presupuesto' => $request->presupuesto,
            'proyecto' => $request->proyecto,
            'beneficiario' => $request->beneficiario,
            'documento' => $request->documento,
            'fecha' => $request->fecha,
            'monto' => $request->monto,
        ]);

        // Redirigir a una página de éxito o de vista previa
        return redirect()->route('viaticos.create')->with('success', 'Solicitud guardada correctamente.');
    }
}
