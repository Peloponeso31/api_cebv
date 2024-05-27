<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\TipoCabelloRequest;
use App\Models\Catalogos\TipoCabello;
use Illuminate\Http\Request;

class TipoCabelloController extends Controller
{
    
    public function index()
    {
        return TipoCabello::all();
    }

    
    public function store(TipoCabelloRequest $request)
    {
        return TipoCabello::create($request->all());
    }

    
    public function show( $id)
    {
        return TipoCabello::FindOrFail($id);
    }

    public function update( $id, TipoCabelloRequest $request)
    {
        $tipocabello= TipoCabello::findOrFail($id);
        return $tipocabello->update($request->all());
    }

   
    public function destroy( $id)
    {
        return TipoCabello::findOrFail($id)->delete();
    }
}
