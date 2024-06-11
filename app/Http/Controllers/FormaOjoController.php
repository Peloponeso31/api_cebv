<?php

namespace App\Http\Controllers;

use App\Http\Resources\FormaOjoResource;
use App\Models\FormaOjo;
use Illuminate\Http\Request;

class FormaOjoController extends Controller
{
    public function index()
    {
        return FormaOjoResource::collection(FormaOjo::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new FormaOjoResource(FormaOjo::create($data));
    }

    public function show(FormaOjo $formaOjo)
    {
        return new FormaOjoResource($formaOjo);
    }

    public function update(Request $request, FormaOjo $formaOjo)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $formaOjo->update($data);

        return new FormaOjoResource($formaOjo);
    }

    public function destroy(FormaOjo $formaOjo)
    {
        $formaOjo->delete();

        return response()->json();
    }
}
