<?php

namespace App\Http\Controllers\Reportes\Hipotesis;

use App\Http\Controllers\Controller;
use App\Models\Reportes\Hipotesis\TipoHipotesis;
use Illuminate\Http\Request;

class TipoHipotesisController extends Controller
{
    public function index()
    {
        return TipoHipotesis::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'circunstancia_id' => ['required', 'integer'],
            'abreviatura' => ['required'],
            'descripcion' => ['required'],
        ]);

        return TipoHipotesis::create($data);
    }

    public function show(TipoHipotesis $tipoHipotesis)
    {
        return $tipoHipotesis;
    }

    public function update(Request $request, TipoHipotesis $tipoHipotesis)
    {
        $data = $request->validate([
            'circunstancia_id' => ['sometimes', 'integer'],
            'abreviatura' => ['sometimes'],
            'descripcion' => ['sometimes'],
        ]);

        $tipoHipotesis->update($data);

        return $tipoHipotesis;
    }

    public function destroy(TipoHipotesis $tipoHipotesis)
    {
        $tipoHipotesis->delete();

        return response()->json();
    }
}
