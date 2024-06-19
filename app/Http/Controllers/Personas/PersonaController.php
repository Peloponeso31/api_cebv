<?php

namespace App\Http\Controllers\Personas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NacionalidadRequest;
use App\Http\Requests\Personas\PersonaRequest;
use App\Http\Requests\Personas\UpdatePersonaRequest;
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

    public function index(Request $request){

            $nombre = $request->input('nombre');

            if($nombre) {

                $personas = Persona::where('nombre', 'like', '%' . $nombre . '%')
                    ->with('desaparecidos.reporte')
                    ->paginate();
            }else
            {
                return PersonaResource::collection(Persona::paginate(5));

            }

            return PersonaResource::collection($personas);

    }

        //--------------------------------------------------------------------------------------
        //obtenemos el termino de busqueda (como un identificador)

        /**$search = $request->input('search');

        if($search)
        {
            //Busca por nombre que coincida con lo ingresado en el input
            $personas = Persona:: where('nombre', 'like', '%'.$search.'%')
                ->with('desaparecidos.reporte')
                ->get();

            $resultados = [];

            foreach ($personas as $persona)
            {
              $desaparecidos = $persona->desaparecidos;

              if ($desaparecidos->isNotEmpty())
              {
                  $reportes = $desaparecidos->map(function($desaparecido){
                      return $desaparecido->reporte;
                  })->unique('id');

                  $resultados[] = [
                      'persona' => $persona,
                      'reportes' => $reportes
                  ];
              }
            }

            return response()->json($resultados);
        }else
        {
            //Si no se ingresa un termino de busqueda, se muestran todas las personas
            $personas = QueryBuilder::for(Persona::class)
                ->allowedFilters(['nombre'])
                ->paginate();

            return PersonaResource::collection($personas);
        }**/


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
}
