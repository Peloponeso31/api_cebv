<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ubicaciones\DireccionRequest;
use App\Http\Resources\Ubicaciones\DireccionResource;
use App\Models\Ubicaciones\Direccion;

class DireccionController extends Controller
{
    public function index()
    {
        $query = Direccion::query();

        if (request()->has('search')) {
            $query = Direccion::search(request('search'));
        }

        return DireccionResource::collection($query->paginate());
    }

    public function store(DireccionRequest $request)
    {
        return Direccion::create($request->all());
    }

    public function show($id)
    {
        return Direccion::findOrFail($id);
    }

    public function update($id, DireccionRequest $request)
    {
        $direccion = Direccion::findOrFail($id);

        return $direccion->update($request->all());
    }

    public function destroy($id)
    {
         return Direccion::findOrFail($id)->delete();
    }
}
