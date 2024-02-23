<?php

namespace App\Http\Controllers;

use App\Models\Hipotesis;
use Illuminate\Http\Request;

class HipotesisController extends Controller
{
    public function index()
    {
        return Hipotesis::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'circunstancia' => ['required', 'integer'],
            'nombre' => ['required'],
        ]);

        return Hipotesis::create($data);
    }

    public function show(Hipotesis $hipotesis)
    {
        return $hipotesis;
    }

    public function update(Request $request, Hipotesis $hipotesis)
    {
        $data = $request->validate([
            'circunstancia' => ['required', 'integer'],
            'nombre' => ['required'],
        ]);

        $hipotesis->update($data);

        return $hipotesis;
    }

    public function destroy(Hipotesis $hipotesis)
    {
        $hipotesis->delete();

        return response()->json();
    }
}
