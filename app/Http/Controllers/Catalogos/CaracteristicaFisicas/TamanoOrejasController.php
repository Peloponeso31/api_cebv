<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\TamanoOrejasRequest;
use App\Http\Resources\TamanoOrejaResource;
use App\Models\Catalogos\CaracteristicasFisicas\TamanoOjos;
use App\Models\Catalogos\CaracteristicasFisicas\TamanoOrejas;
use Illuminate\Http\Request;

class TamanoOrejasController extends Controller
{

    public function index()
    {
        return TamanoOrejaResource::collection(TamanoOrejas::all());
    }



    public function store(TamanoOrejasRequest $request)
    {
        return TamanoOrejas::create($request->all());
    }


    public function show( $id)
    {
        return TamanoOrejas::FindOrFail($id);
    }



    public function update($id, TamanoOrejasRequest $request)
    {
        $tamanoorejas= TamanoOrejas::findOrFail($id);
        return $tamanoorejas->update($request->all());
    }

    public function destroy( $id)
    {

    return TamanoOrejas::findOrFail($id)->delete();

    }
}
