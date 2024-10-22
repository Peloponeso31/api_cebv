<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\MetodoCaptura;
use Illuminate\Http\Request;

class MetodoCapturaController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(MetodoCaptura::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(MetodoCaptura::create($data));
    }

    public function show(MetodoCaptura $metodoCaptura)
    {
        return new CatalogoResource($metodoCaptura);
    }

    public function update(Request $request, MetodoCaptura $metodoCaptura)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $metodoCaptura->update($data);

        return new CatalogoResource($metodoCaptura);
    }

    public function destroy(MetodoCaptura $metodoCaptura)
    {
        $metodoCaptura->delete();

        return response()->json();
    }
}
