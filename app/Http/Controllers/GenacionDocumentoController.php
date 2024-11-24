<?php

namespace App\Http\Controllers;

use App\Models\GeneracionDocumento;
use Illuminate\Http\Request;

class GenacionDocumentoController extends Controller
{
    public function index()
    {
        return GeneracionDocumento::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'resultado_rnd' => ['required'],
            'firma_ausencia' => ['required'],
            'reporte_id' => ['required', 'exists:reportes'],
        ]);

        return GeneracionDocumento::create($data);
    }

    public function show(GeneracionDocumento $genacionDocumento)
    {
        return $genacionDocumento;
    }

    public function update(Request $request, GeneracionDocumento $genacionDocumento)
    {
        $data = $request->validate([
            'resultado_rnd' => ['required'],
            'firma_ausencia' => ['required'],
            'reporte_id' => ['required', 'exists:reportes'],
        ]);

        $genacionDocumento->update($data);

        return $genacionDocumento;
    }

    public function destroy(GeneracionDocumento $genacionDocumento)
    {
        $genacionDocumento->delete();

        return response()->json();
    }
}
