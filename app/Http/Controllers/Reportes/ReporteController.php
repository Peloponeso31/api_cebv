<?php

namespace App\Http\Controllers\Reportes;

use App\Exports\ReportesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\ReporteRequest;
use App\Http\Resources\Reportes\ReporteResource;
use App\Http\Resources\ReportesDashboardResource;
use App\Models\Reportes\Reporte;
use App\Services\CrudService;
use App\Services\ReporteFilter\ReporteFilters;
use App\Services\ReporteService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function index(Request $request)
    {
        $query = $this->model::query();

        if ($request->all()) {
            $reporteFilter = new ReporteFilters($request);
            $query = $reporteFilter->applyFilter();
        }

        return ReporteResource::collection($query->get());
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

    public function vistaReportesDashboard()
    {
        return ReportesDashboardResource::collection(Reporte::get());
    }

    public function exportExcell()
    {
        return Excel::download(new ReportesExport, 'reportes.xlsx');
    }
}
