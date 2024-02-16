<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;

class ReporteController extends Controller
{
    #TODO: Esto es una prueba
    public function obtener(Request $request) {
        return response()->json(Reporte::with(['reportante', 'reportada'])->get());
    }
}
