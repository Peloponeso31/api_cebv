<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrendaDeVestirRequest;
use App\Http\Requests\UpdatePrendaDeVestirRequest;
use App\Http\Resources\PrendaDeVestirResource;
use App\Models\Catalogos\PrendaDeVestir;
use Request;

class PrendaDeVestirController extends Controller
{
   
    public function index()
    {
        return PrendaDeVestirResource::collection(PrendaDeVestir::all());
    }

    
    public function store(StorePrendaDeVestirRequest $request)
    {
        return new PrendaDeVestirResource(PrendaDeVestir::create($request->all()));
    }

    
    public function show($id)
    {
        $model = PrendaDeVestir::findOrFail($id);

        return new PrendaDeVestirResource($model);
    }

    
    public function update($id, UpdatePrendaDeVestirRequest $request)
    {
        $model = PrendaDeVestir::findOrFail($id);

        $model->update($request->all());
    }

    
    public function destroy($id)
    {
            $model = PrendaDeVestir::findOrFail($id);
            $model->delete();
            return response()->json(['message' => 'Deleted']);
    }
}
