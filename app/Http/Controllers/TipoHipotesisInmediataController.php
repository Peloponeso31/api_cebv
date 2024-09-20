<?php

namespace App\Http\Controllers;

use App\Http\Resources\BasicResource;
use App\Models\TipoHipotesisInmediata;
use Illuminate\Http\Request;

class TipoHipotesisInmediataController extends Controller
{
    public function index()
    {
        return BasicResource::collection(TipoHipotesisInmediata::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'abreviatura' => ['required'],
            'nombre' => ['required'],
        ]);

        return new BasicResource(TipoHipotesisInmediata::create($data));
    }

    public function show(TipoHipotesisInmediata $tipoHipotesisInmediata)
    {
        return new BasicResource($tipoHipotesisInmediata);
    }

    public function update(Request $request, TipoHipotesisInmediata $tipoHipotesisInmediata)
    {
        $data = $request->validate([
            'abreviatura' => ['required'],
            'nombre' => ['required'],
        ]);

        $tipoHipotesisInmediata->update($data);

        return new BasicResource($tipoHipotesisInmediata);
    }

    public function destroy(TipoHipotesisInmediata $tipoHipotesisInmediata)
    {
        $tipoHipotesisInmediata->delete();

        return response()->json();
    }
}
