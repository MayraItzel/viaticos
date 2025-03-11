<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use NumberToWords\NumberToWords;

class SolicitudViaticosController extends Controller
{
    public function generarPDF(Request $request)
    {
        // Recibe los datos del formulario
        $datos = [
            'solicitante' => $request->input('solicitante'),
            'puesto' => $request->input('puesto'),
            'dependencia' => $request->input('dependencia'),
            'importe' => $request->input('importe'),
            'importe_letras' => $this->convertirNumeroALetras($request->input('importe')), // Convertir a letras
            'concepto' => $request->input('concepto'),
            'cuenta' => $request->input('cuenta'),
            'clabe' => $request->input('clabe'),
            'presupuesto' => $request->input('presupuesto'),
            'proyecto' => $request->input('proyecto'),
            'beneficiario' => $request->input('beneficiario'),
            'documento' => $request->input('documento'),
            'fecha' => $request->input('fecha'),
            'monto' => $request->input('monto'),
        ];

        // Genera el PDF con los datos del formulario
        $pdf = Pdf::loadView('pdf.solicitud', $datos);
        return $pdf->download('solicitud_viaticos.pdf');
    }

    private function convertirNumeroALetras($numero)
    {
        try {
            $numberToWords = new NumberToWords();
            $numberTransformer = $numberToWords->getNumberTransformer('es'); // Idioma español
            return strtoupper($numberTransformer->toWords((int) $numero)) . " PESOS 00/100 M.N.";
        } catch (\Exception $e) {
            return "ERROR AL CONVERTIR NÚMERO";
        }
    }
}