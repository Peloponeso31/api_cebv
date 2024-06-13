<?php

namespace App\Http\Controllers\Catalogos\CaracteristicaFisicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\CaracteristicasFisicas\BarbaRequest;
use App\Models\Catalogos\CaracteristicasFisicas\Barba;
use Illuminate\Http\Request;

class BarbaController extends Controller
{

    public function index()
    {
        return Barba::all();
    }

    public function store(BarbaRequest $request)
    {
        return Barba::create($request->all());
    }

    public function show( $id)
    {
        return Barba::FindOrFail($id);
    }

    public function update( $id, BarbaRequest $request)
    {
        $barba= Barba::findOrFail($id);
        return $barba->update($request->all());
    }

    public function destroy( $id)
    {
        return Barba::findOrFail($id)->delete();
    }
}
