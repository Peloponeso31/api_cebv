<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\FormaOjo;
use Illuminate\Http\Request;

class FormaOjoController extends Controller
{
    public function index()
    {
        return CatalogoResource::collection(FormaOjo::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(FormaOjo::create($data));
    }

    public function show(FormaOjo $formaOjo)
    {
        return new CatalogoResource($formaOjo);
    }

    public function update(Request $request, FormaOjo $formaOjo)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $formaOjo->update($data);

        return new CatalogoResource($formaOjo);
    }

    public function destroy(FormaOjo $formaOjo)
    {
        $formaOjo->delete();

        return response()->json();
    }
}
