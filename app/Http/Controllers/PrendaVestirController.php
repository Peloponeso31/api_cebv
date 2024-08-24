<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrendaVestirRequest;
use App\Http\Requests\UpdatePrendaVestirRequest;
use App\Http\Resources\PrendaVestirResource;
use App\Models\Catalogos\PrendaVestir;
use Request;

class PrendaVestirController extends Controller
{

    public function index()
    {
        return PrendaVestirResource::collection(PrendaVestir::all());
    }


    public function store(StorePrendaVestirRequest $request)
    {
        return new PrendaVestirResource(PrendaVestir::create($request->all()));
    }


    public function show($id)
    {
        $model = PrendaVestir::findOrFail($id);

        return new PrendaVestirResource($model);
    }


    public function update($id, UpdatePrendaVestirRequest $request)
    {
        $model = PrendaVestir::findOrFail($id);

        $model->update($request->all());
    }


    public function destroy($id)
    {
            $model = PrendaVestir::findOrFail($id);
            $model->delete();
            return response()->json(['message' => 'Deleted']);
    }
}
