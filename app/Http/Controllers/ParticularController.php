<?php

namespace App\Http\Controllers;

use App\Http\Resources\ParticularResource;
use App\Models\Particular;
use Illuminate\Http\Request;

class ParticularController extends Controller
{
    public function index()
    {
        return ParticularResource::collection(Particular::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new ParticularResource(Particular::create($data));
    }

    public function show(Particular $particular)
    {
        return new ParticularResource($particular);
    }

    public function update(Request $request, Particular $particular)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $particular->update($data);

        return new ParticularResource($particular);
    }

    public function destroy(Particular $particular)
    {
        $particular->delete();

        return response()->json();
    }
}
