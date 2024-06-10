<?php

namespace App\Http\Controllers\Catalogos\MediaFiliacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\MediaFiliacion\TratamientoDentalRequest;
use App\Models\Catalogos\MediaFiliacion\TratamientoDental;
use Illuminate\Http\Request;

class TratamientoDentalController extends Controller
{
    
    public function index()
    {
        return TratamientoDental::all();
    }

    public function store(TratamientoDentalRequest $request)
    {
        return TratamientoDental::create($request->all());
    }

    public function show( $id)
    {
        return TratamientoDental::FindOrFail($id);
    }

    public function update( $id, TratamientoDentalRequest $request)
    {
        $tratamientodental= TratamientoDental::findOrFail($id);
        return $tratamientodental->update($request->all());
    }

    public function destroy( $id)
    {
        return TratamientoDental::findOrFail($id)->delete();
    }
}
