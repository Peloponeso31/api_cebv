<?php

namespace App\Http\Controllers;

use App\Http\Resources\EnfoqueDiferenciadoResource;
use App\Models\EnfoqueDiferenciado;
use Illuminate\Http\Request;

class EnfoqueDiferenciadoController extends Controller
{
    public function index()
    {
        return EnfoqueDiferenciadoResource::collection(EnfoqueDiferenciado::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new EnfoqueDiferenciadoResource(EnfoqueDiferenciado::create($data));
    }

    public function show(EnfoqueDiferenciado $enfoqueDiferenciado)
    {
        return new EnfoqueDiferenciadoResource($enfoqueDiferenciado);
    }

    public function update(Request $request, EnfoqueDiferenciado $enfoqueDiferenciado)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $enfoqueDiferenciado->update($data);

        return new EnfoqueDiferenciadoResource($enfoqueDiferenciado);
    }

    public function destroy(EnfoqueDiferenciado $enfoqueDiferenciado)
    {
        $enfoqueDiferenciado->delete();

        return response()->json();
    }
}
