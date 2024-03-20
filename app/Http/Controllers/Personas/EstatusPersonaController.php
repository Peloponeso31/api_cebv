<?php

namespace App\Http\Controllers\Personas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personas\EstatusPersonaRequest;
use App\Models\Personas\EstatusPersona;

class EstatusPersonaController extends Controller
{
    public function index()
    {
        return EstatusPersona::all();
    }

    public function store(EstatusPersonaRequest $request)
    {
        return EstatusPersona::create($request->validated());
    }

    public function show(EstatusPersona $estatusPersona)
    {
        return $estatusPersona;
    }

    public function update(EstatusPersonaRequest $request, EstatusPersona $estatusPersona)
    {
        $estatusPersona->update($request->validated());

        return $estatusPersona;
    }

    public function destroy(EstatusPersona $estatusPersona)
    {
        $estatusPersona->delete();

        return response()->json();
    }
}
