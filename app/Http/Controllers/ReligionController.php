<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalogos\ReligionRequest;
use App\Models\Catalogos\Religion;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
    
    public function index()
    {
        return Religion::all();
    }

    public function store(ReligionRequest $request)
    {
        return Religion::create($request->all());
    }

    
    public function show($id)
    {
        return Religion::FindOrFail($id);
    }

    
    public function update($id, ReligionRequest $request)
    {
        $religion= Religion::findOrFail($id);
        return $religion->update($request->all());
    }

   
    public function destroy($id)
    {
        return Religion::findOrFail($id)->delete();
    }
}
