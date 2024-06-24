<?php

namespace App\Http\Controllers;

use App\Http\Resources\EstatusPerpetradorResource;
use App\Models\EstatusPerpetrador;
use Illuminate\Http\Request;

class EstatusPerpetradorController extends Controller
{
    public function index()
    {
        return EstatusPerpetradorResource::collection(EstatusPerpetrador::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new EstatusPerpetradorResource(EstatusPerpetrador::create($data));
    }

    public function show(EstatusPerpetrador $estatusPerpetrador)
    {
        return new EstatusPerpetradorResource($estatusPerpetrador);
    }

    public function update(Request $request, EstatusPerpetrador $estatusPerpetrador)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $estatusPerpetrador->update($data);

        return new EstatusPerpetradorResource($estatusPerpetrador);
    }

    public function destroy(EstatusPerpetrador $estatusPerpetrador)
    {
        $estatusPerpetrador->delete();

        return response()->json();
    }
}
