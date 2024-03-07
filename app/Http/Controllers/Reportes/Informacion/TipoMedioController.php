<?php

namespace App\Http\Controllers\Reportes\Informacion;

use App\Http\Controllers\Controller;
use App\Models\Reportes\Informacion\TipoMedio;
use Illuminate\Http\Request;

class TipoMedioController extends Controller
{
    public function index()
    {
        return TipoMedio::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return TipoMedio::create($data);
    }

    public function show(TipoMedio $tipoReporte)
    {
        return $tipoReporte;
    }

    public function update(Request $request, TipoMedio $tipoReporte)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $tipoReporte->update($data);

        return $tipoReporte;
    }

    public function destroy(TipoMedio $tipoReporte)
    {
        $tipoReporte->delete();

        return response()->json();
    }
}
