<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePertenenciaRequest;
use App\Http\Requests\UpdatePertenenciaRequest;
use App\Http\Resources\PertenenciaResource;
use App\Models\Pertenencia;
use App\Services\CrudService;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;


class PertenenciaController extends Controller
{
    protected CrudService $service;
    protected Pertenencia $model;

    public function __construct(CrudService $service, Pertenencia $model)
    {
        $this->service = $service;
        $this->model = $model;
    }


    public function index(Request $request)
    {
        $query = QueryBuilder::for(Pertenencia::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('grupo_pertenencia_id')
            ]);


        // Verifica si ninguno de los filtros 'id' o 'grupo_pertenencia_id' está presente
        if (!$request->has('id') && !$request->has('grupo_pertenencia_id')) {
            $query->withPrendasCount()->orderBy('prenda_vestir_count', 'desc');
        }


        $query = $query->get();

        return PertenenciaResource::collection($query);
    }


    public function store(StorePertenenciaRequest $request)
    {
        return new PertenenciaResource(Pertenencia::create($request->all()));
    }


    public function show($id)
    {
        $model = Pertenencia::findOrFail($id);

        return new PertenenciaResource($model);
    }


    public function update($id, UpdatePertenenciaRequest $request)
    {
        $model = Pertenencia::findOrFail($id);

        $model->update($request->all());
    }


    public function destroy($id)
    {
            $model = Pertenencia::findOrFail($id);
            $model->delete();
            return response()->json(['message' => 'Deleted']);
    }
}
