<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoRedSocialRequest;
use App\Models\TipoRedSocial;
use Illuminate\Http\Request;

class TipoRedSocialController extends Controller
{
    
    public function index()
    {
        return TipoRedSocial::all();
    }

    
    public function store(TipoRedSocialRequest $request)
    {
        return TipoRedSocial::create($request->all());
    }

    
    public function show($id)
    {
        return TipoRedSocial::FindOrFail($id);
    }

    public function update($id, TipoRedSocialRequest $request)
    {
        $tiporedsocial= TipoRedSocial::findOrFail($id);
        return $tiporedsocial->update($request->all());
    }

    
    public function destroy($id)
    {
        return TipoRedSocial::findOrFail($id)->delete();
    }
}
