<?php

namespace App\Http\Controllers\Reportes\Informacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Informacion\TipoMedioRequest;
use App\Models\Reportes\Informacion\TipoMedio;
use Illuminate\Http\Request;

class TipoMedioController extends Controller
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
        return TipoMedio::all();
    }

    public function store(TipoMedioRequest $request)
    {
        return TipoMedio::create($request->all());
    }

    public function show($id)
    {
        return TipoMedio::findOrFail($id);
    }

    public function update($id, TipoMedioRequest $request)
    {
        $tipoMedio = TipoMedio::findOrFail($id);

        return $tipoMedio->update($request->all());
    }

    public function destroy($id)
    {
        return TipoMedio::destroy($id);
    }
}
