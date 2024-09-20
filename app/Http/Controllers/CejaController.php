<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\Ceja;
use Illuminate\Http\Request;

class CejaController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(Ceja::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(Ceja::create($data));
    }

    public function show(Ceja $ceja)
    {
        return new CatalogoResource($ceja);
    }

    public function update(Request $request, Ceja $ceja)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $ceja->update($data);

        return new CatalogoResource($ceja);
    }

    public function destroy(Ceja $ceja)
    {
        $ceja->delete();

        return response()->json();
    }
}
