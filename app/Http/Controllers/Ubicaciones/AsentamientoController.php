<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Models\Ubicaciones\Asentamiento;
use Illuminate\Http\Request;

class AsentamientoController extends Controller
{
    public function index()
    {
        return Asentamiento::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'municipio_id' => ['required', 'integer'],
            'codigo_postal' => ['required', 'integer'],
            'nombre' => ['required'],
        ]);

        return Asentamiento::create($data);
    }

    public function show(Asentamiento $asentamiento)
    {
        return $asentamiento;
    }

    public function update(Request $request, Asentamiento $asentamiento)
    {
        $data = $request->validate([
            'municipio_id' => ['required', 'integer'],
            'codigo_postal' => ['required', 'integer'],
            'nombre' => ['required'],
        ]);

        $asentamiento->update($data);

        return $asentamiento;
    }

    public function destroy(Asentamiento $asentamiento)
    {
        $asentamiento->delete();

        return response()->json();
    }
}
