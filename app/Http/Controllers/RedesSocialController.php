<?php

namespace App\Http\Controllers;

use App\Http\Requests\RedesSocialRequest;
use App\Models\Personas\RedesSocial;
use Illuminate\Http\Request;

class RedesSocialController extends Controller
{
    
    public function index()
    {
        return RedesSocial::all();
    }

    
    public function store(RedesSocialRequest $request)
    {
        return RedesSocial::create($request->all());
    }

    
    public function show($id)
    {
        return RedesSocial::FindOrFail($id);
    }

    public function update($id, RedesSocialRequest $request)
    {
        $redessocial= RedesSocial::findOrFail($id);
        return $redessocial->update($request->all());
    }

    
    public function destroy($id)
    {
        return RedesSocial::findOrFail($id)->delete();
    }
}
