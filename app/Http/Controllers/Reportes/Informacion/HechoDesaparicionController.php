<?php

namespace App\Http\Controllers\Reportes\Informacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Informacion\HechoDesaparicionRequest;
use App\Models\Reportes\Informacion\HechoDesaparicion;

class HechoDesaparicionController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:buscar') ->only('index', 'show');
        $this->middleware('can:creacion') ->only('store');
        $this->middleware('can:edicion') ->only('update');
        $this->middleware('can:eliminacion') ->only('destroy');  
    }
    
    public function index()
    {
        $query = HechoDesaparicion::query();

        if (request()->has('search')) {
            $query = HechoDesaparicion::search(request('search'));
        }

        return $query->get();
    }

    public function store(HechoDesaparicionRequest $request)
    {
        return HechoDesaparicion::create($request->all());
    }

    public function show($id)
    {
        return HechoDesaparicion::findOrFail($id);
    }

    public function update($id, HechoDesaparicionRequest $request)
    {
        $model = HechoDesaparicion::findOrFail($id);

        return $model->update($request->all());
    }

    public function destroy($id)
    {
        return HechoDesaparicion::destroy($id);
    }
}
