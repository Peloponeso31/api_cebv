<?php

namespace App\Http\Controllers\Personas;

use App\Http\Controllers\Controller;
use App\Http\Requests\NacionalidadRequest;
use App\Http\Requests\Personas\PersonaRequest;
use App\Http\Requests\Personas\UpdatePersonaRequest;
use App\Http\Resources\FolioResource;
use App\Http\Resources\PersonaCompactResource;
use App\Http\Resources\Personas\PersonaResource;
use App\Models\Nacionalidad;
use App\Models\Personas\Persona;
use App\Services\CrudService;
use Spatie\QueryBuilder\QueryBuilder;

class PersonaController extends Controller
{
    protected CrudService $service;
    protected Persona $model;

    public function __construct(CrudService $service, Persona $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    public function index()
    {
        $personas = QueryBuilder::for(Persona::class)
            ->allowedFilters(['nombre', 'apellido_paterno', 'apellido_materno'])
            ->get();

        if (request()->has('filter')) {
            return PersonaCompactResource::collection($personas);
        }

        return PersonaResource::collection($personas);
    }

    public function store(PersonaRequest $request)
    {
        return $this->service->store($request, $this->model, new PersonaResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new PersonaResource($this->model::class));
    }

    public function update($id, PersonaRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new PersonaResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }

    public function addNacionality($personaId, $nacionalidadId)
    {
        $persona = Persona::findOrFail($personaId);
        $nacionalidad = Nacionalidad::findOrFail($nacionalidadId);

        $persona->nacionalidads()->attach($nacionalidad->id);

        return PersonaResource::make($persona);
    }

    public function removeNacionality($personaId, $nacionalidadId)
    {
        $persona = Persona::findOrFail($personaId);
        $nacionalidad = Nacionalidad::findOrFail($nacionalidadId);

        $persona->nacionalidads()->detach($nacionalidad->id);

        return PersonaResource::make($persona);
    }

    public function getFolios($personaId)
    {
        $persona = Persona::findOrFail($personaId);

        return FolioResource::collection($persona->folios);
    }
}
