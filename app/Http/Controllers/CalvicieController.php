<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogoResource;
use App\Models\Calvicie;
use Illuminate\Http\Request;

class CalvicieController extends Controller
{
    public function index()
    {
        $calvicies = Calvicie::withCalviciesCount()->orderBy('cabellos_count','desc')->get();

        return CatalogoResource::collection($calvicies);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CatalogoResource(Calvicie::create($data));
    }

    public function show(Calvicie $calvicie)
    {
        return new CatalogoResource($calvicie);
    }

    public function update(Request $request, Calvicie $calvicie)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $calvicie->update($data);

        return new CatalogoResource($calvicie);
    }

    public function destroy(Calvicie $calvicie)
    {
        $calvicie->delete();

        return response()->json();
    }
}
