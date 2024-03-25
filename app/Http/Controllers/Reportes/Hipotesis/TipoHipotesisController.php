<?php

namespace App\Http\Controllers\Reportes\Hipotesis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Hipotesis\TipoHipotesisRequest;
use App\Models\Reportes\Hipotesis\TipoHipotesis;

class TipoHipotesisController extends Controller
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
        $query = TipoHipotesis::query();

        if (request()->has('search')) {
            $query = TipoHipotesis::search(request('search'));
        }

        return $query->get();
    }

    public function store(TipoHipotesisRequest $request)
    {
        return TipoHipotesis::create($request->all());
    }

    public function show($id)
    {
        return TipoHipotesis::findOrFail($id);
    }

    public function update($id, TipoHipotesisRequest $request)
    {
        $tipoHipotesis = TipoHipotesis::findOrFail($id);

        return $tipoHipotesis->update($request->all());
    }

    public function destroy($id)
    {
        return TipoHipotesis::findOrFail($id)->delete();
    }
}
