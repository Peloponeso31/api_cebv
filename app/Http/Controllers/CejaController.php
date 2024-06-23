<?php

namespace App\Http\Controllers;

use App\Http\Resources\CejaResource;
use App\Models\Ceja;
use Illuminate\Http\Request;

class CejaController extends Controller
{
    public function index()
    {
        return CejaResource::collection(Ceja::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CejaResource(Ceja::create($data));
    }

    public function show(Ceja $ceja)
    {
        return new CejaResource($ceja);
    }

    public function update(Request $request, Ceja $ceja)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $ceja->update($data);

        return new CejaResource($ceja);
    }

    public function destroy(Ceja $ceja)
    {
        $ceja->delete();

        return response()->json();
    }
}
