<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\Particular;
use Illuminate\Http\Request;

class ParticularController extends Controller
{
    public function index()
    {
        $particulares = Particular::withParticularesCount()->orderBy('desapariciones_forzadas_count','desc')->get();

        return CatalogoResource::collection($particulares);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(Particular::create($data));
    }

    public function show(Particular $particular)
    {
        return new CatalogoResource($particular);
    }

    public function update(Request $request, Particular $particular)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $particular->update($data);

        return new CatalogoResource($particular);
    }

    public function destroy(Particular $particular)
    {
        $particular->delete();

        return response()->json();
    }
}
