<?php

namespace App\Http\Controllers\Reportes\Hipotesis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reportes\Hipotesis\HipotesisRequest;
use App\Models\Reportes\Hipotesis\Hipotesis;
use Illuminate\Http\Request;

class HipotesisController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:buscar') ->only('index', 'show');
        $this->middleware('can:creacion') ->only('store');
        $this->middleware('can:edicion') ->only('update');
        $this->middleware('can:eliminacion') ->only('destroy');  
    }
    
    public function index()
    {
        $query = Hipotesis::query();

        if (request()->has('search')) {
            $query = Hipotesis::search(request('search'));
        }

        return $query->get();
    }

    public function store(HipotesisRequest $request)
    {
        return Hipotesis::create($request->all());
    }

    public function show($id)
    {
        return Hipotesis::findOrFail($id);
    }

    public function update($id, HipotesisRequest $request)
    {
        $hipotesis = Hipotesis::findOrFail($id);

        $hipotesis->update($request->all());

        return $hipotesis;
    }

    public function destroy($id)
    {
        $hipotesis = Hipotesis::findOrFail($id);

        $hipotesis->delete();

        return response()->json();
    }
}
