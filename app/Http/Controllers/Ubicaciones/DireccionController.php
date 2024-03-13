<?php

namespace App\Http\Controllers\Ubicaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ubicaciones\DireccionRequest;
use App\Http\Resources\Ubicaciones\DireccionResource;
use App\Models\Ubicaciones\Direccion;

class DireccionController extends Controller
{
    public function __construct()
    {
        /**
         * Permisos para el controlador DireccionController a
         * través del middleware y roles de Spatie
         */
        //$this->middleware('role:guest_test|user_test|admin_test')->only('index', 'show');
        //$this->middleware('role:user_test|admin_test')->only('store', 'update');
        //$this->middleware('role:admin_test')->only('destroy');

        /**
         * Permisos para el controlador DireccionController a
         * través del middleware y permisos de Spatie
         */
        //$this->middleware('permission:read_test')->only('index', 'show');
        //$this->middleware('permission:create_test')->only('store');
        //$this->middleware('permission:update_test')->only('update');
        //$this->middleware('permission:delete_test')->only('destroy');
    }


    public function index()
    {
        $query = Direccion::query();

        if (request()->has('search')) {
            $query = Direccion::search(request('search'));
        }

        return DireccionResource::collection($query->paginate());
    }

    public function store(DireccionRequest $request)
    {
        return Direccion::create($request->all());
    }

    public function show($id)
    {
        return Direccion::findOrFail($id);
    }

    public function update($id, DireccionRequest $request)
    {
        $direccion = Direccion::findOrFail($id);

        return $direccion->update($request->all());
    }

    public function destroy($id)
    {
         return Direccion::findOrFail($id)->delete();
    }
}
