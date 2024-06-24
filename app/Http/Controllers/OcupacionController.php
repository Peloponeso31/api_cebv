<?php

namespace App\Http\Controllers;

use App\Http\Resources\OcupacionResource;
use App\Models\Ocupacion;
use Illuminate\Http\Request;

class OcupacionController extends Controller
{
    public function index()
    {

        $query = Ocupacion::query();

        if (request()->has('search')) {
            $query = Ocupacion::search(request('search'));
        }

        return OcupacionResource::collection($query->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new OcupacionResource(Ocupacion::create($data));
    }

    public function show(Ocupacion $ocupacion)
    {
        return new OcupacionResource($ocupacion);
    }

    public function update(Request $request, Ocupacion $ocupacion)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $ocupacion->update($data);

        return new OcupacionResource($ocupacion);
    }

    public function destroy(Ocupacion $ocupacion)
    {
        $ocupacion->delete();

        return response()->json();
    }
}
