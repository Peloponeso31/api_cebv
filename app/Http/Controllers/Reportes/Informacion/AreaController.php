<?php

namespace App\Http\Controllers\Reportes\Informacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Informacion\AreaRequest;
use App\Models\Reportes\Informacion\Area;

class AreaController extends Controller
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
        $query = Area::query();

        if (request()->has('search')) {
            $query = Area::search(request('search'));
        }

        return $query->get();
    }

    public function store(AreaRequest $request)
    {
        return Area::create($request->all());
    }

    public function show($id)
    {
        return Area::findOrFail($id);
    }

    public function update($id, AreaRequest $request)
    {
        $model = Area::findOrFail($id);

        return $model->update($request->all());
    }

    public function destroy($id)
    {
        return Area::findOrFail($id)->delete();
    }
}
