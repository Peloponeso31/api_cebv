<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\FormaCara;
use App\Models\Sexo;
use Illuminate\Http\Request;

class SexoController extends Controller
{
    public function index()
    {
        //Usando scope en el modelo 'Sexo'
        $sexos = Sexo::withSexosCount()->orderBy('personas_count','desc')->get();

        return CatalogoResource::collection($sexos);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(Sexo::create($data));
    }

    public function show(Sexo $sexo)
    {
        return new CatalogoResource($sexo);
    }

    public function update(Request $request, Sexo $sexo)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $sexo->update($data);

        return new CatalogoResource($sexo);
    }

    public function destroy(Sexo $sexo)
    {
        $sexo->delete();

        return response()->json();
    }
}
