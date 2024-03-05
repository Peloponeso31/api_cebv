<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use App\Models\Reportes\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()
    {
        return Reporte::all();
    }

    public function store(Request $request)
    {
        // TODO: Implement store method
    }

    public function show($id)
    {
        // TODO: Implement show method
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update method
    }

    public function destroy(Request $request, $id)
    {
        // TODO: Implement destroy method
    }
}
