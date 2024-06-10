<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\CalvicieRequest;
use App\Models\Catalogos\CaracteristicasFisicas\Calvicie;
use Illuminate\Http\Request;

class CalvicieController extends Controller
{
    
    public function index()
    {
        return Calvicie::all();
    }

    public function store(CalvicieRequest $request)
    {
        return Calvicie::create($request->all());
    }

    public function show( $id)
    {
        return Calvicie::FindOrFail($id);
    }

    public function update( $id, CalvicieRequest $request)
    {
        $calvicie= Calvicie::findOrFail($id);
        return $calvicie->update($request->all());
    }

    public function destroy( $id)
    {
        return Calvicie::findOrFail($id)->delete();
    }
}
