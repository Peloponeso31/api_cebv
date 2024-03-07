<?php

namespace App\Http\Controllers\Reportes\Hipotesis;

use App\Http\Controllers\Controller;
use App\Models\Reportes\Hipotesis\Hipotesis;
use Illuminate\Http\Request;

class HipotesisController extends Controller
{
    public function index()
    {
        return Hipotesis::all();
    }

    public function store(Request $request)
    {
        // TODO implementar el metodo store
    }

    public function show(Hipotesis $hipotesis)
    {
        return $hipotesis;
    }

    public function update(Request $request, Hipotesis $hipotesis)
    {
        // TODO implementar el metodo update
    }

    public function destroy(Hipotesis $hipotesis)
    {
        $hipotesis->delete();

        return response()->json();
    }
}
