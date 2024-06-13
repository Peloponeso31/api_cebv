<?php

namespace App\Http\Controllers\Catalogos\MediaFiliacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\MediaFiliacion\AusenciaDientesRequest;
use App\Models\Catalogos\MediaFiliacion\AusenciaDientes;
use Illuminate\Http\Request;

class AusenciaDientesController extends Controller
{

    public function index()
    {
        return AusenciaDientes::all();
    }

    public function store(AusenciaDientesRequest $request)
    {
        return AusenciaDientes::create($request->all());
    }

    public function show( $id)
    {
        return AusenciaDientes::FindOrFail($id);
    }

    public function update( $id, AusenciaDientesRequest $request)
    {
        $ausenciadientes= AusenciaDientes::findOrFail($id);
        return $ausenciadientes->update($request->all());
    }

    public function destroy( $id)
    {
        return AusenciaDientes::findOrFail($id)->delete();
    }
}
