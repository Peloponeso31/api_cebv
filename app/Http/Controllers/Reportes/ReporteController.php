<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\ReporteRequest;
use App\Http\Resources\Personas\PersonaResource;
use App\Http\Resources\Reportes\ReporteResource;
use App\Http\Resources\ReportesDashboardResource;
use App\Models\Personas\Persona;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Reporte;
use App\Services\CrudService;
use App\Services\ReporteService;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\Searchable\Search;

class ReporteController extends Controller
{
    protected CrudService $service;
    protected Reporte $model;
    protected ReporteService $reporteService;

    public function __construct(CrudService $service, ReporteService $reporteService, Reporte $model)
    {
        $this->service = $service;
        $this->reporteService = $reporteService;
        $this->model = $model;
    }

    public function index()
    {
        $busqueda = (new Search())
            ->registerModel(Reporte::class, "tipo_reporte_id")
            ->registerModel(Desaparecido::class, "persona_id")
            ->registerModel(Persona::class, "nombre")
            ->search("ia")
            ->groupByType();

        return $busqueda;
    }

    public function store(ReporteRequest $request)
    {
        return $this->service->store($request, $this->model, new ReporteResource($this->model::class));
    }

    public function show($id)
    {
        return $this->service->show($id, $this->model, new ReporteResource($this->model::class));
    }

    public function update($id, ReporteRequest $request)
    {
        return $this->service->update($id, $request, $this->model, new ReporteResource($this->model::class));
    }

    public function destroy($id)
    {
        return $this->service->destroy($id, $this->model);
    }

    public function getFolios($id)
    {
        return $this->reporteService->getFolios($id);
    }

    public function setFolio($id)
    {
        return $this->reporteService->setFolio($id, auth()->id());
    }

    public function vistaReportesDashboard() {
        return ReportesDashboardResource::collection(Reporte::get());
    }
}
