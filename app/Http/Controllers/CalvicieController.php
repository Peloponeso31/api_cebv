<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalvicieResource;
use App\Models\Calvicie;
use Illuminate\Http\Request;

class CalvicieController extends Controller
{
    public function index()
    {
        return CalvicieResource::collection(Calvicie::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        return new CalvicieResource(Calvicie::create($data));
    }

    public function show(Calvicie $calvicie)
    {
        return new CalvicieResource($calvicie);
    }

    public function update(Request $request, Calvicie $calvicie)
    {
        $data = $request->validate([
            'nombre' => ['required'],
        ]);

        $calvicie->update($data);

        return new CalvicieResource($calvicie);
    }

    public function destroy(Calvicie $calvicie)
    {
        $calvicie->delete();

        return response()->json();
    }
}
