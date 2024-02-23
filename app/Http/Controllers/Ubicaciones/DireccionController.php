<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    public function index()
    {
        return Direccion::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'asentamiento_id' => ['required', 'integer'],
            'calle' => ['required'],
            'numero_exterior' => ['required'],
            'numero_interior' => ['nullable'],
            'calle_1' => ['nullable'],
            'calle_2' => ['nullable'],
            'descripcion' => ['nullable'],
        ]);

        return Direccion::create($data);
    }

    public function show(Direccion $direccion)
    {
        return $direccion;
    }

    public function update(Request $request, Direccion $direccion)
    {
        $data = $request->validate([
            'asentamiento_id' => ['required', 'integer'],
            'calle' => ['required'],
            'numero_exterior' => ['required'],
            'numero_interior' => ['nullable'],
            'calle_1' => ['nullable'],
            'calle_2' => ['nullable'],
            'descripcion' => ['nullable'],
        ]);

        $direccion->update($data);

        return $direccion;
    }

    public function destroy(Direccion $direccion)
    {
        $direccion->delete();

        return response()->json();
    }
}
