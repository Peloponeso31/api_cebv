<?php

namespace App\Http\Controllers;

use App\Http\Requests\RedSocialRequest;
use App\Http\Resources\RedSocialResource;
use App\Models\RedSocial;

class RedSocialController extends Controller
{
    public function index()
    {
        return RedSocialResource::collection(RedSocial::all());
    }

    public function store(RedSocialRequest $request)
    {
        return new RedSocialResource(RedSocial::create($request->validated()));
    }

    public function show(RedSocial $redSocial)
    {
        return new RedSocialResource($redSocial);
    }

    public function update(RedSocialRequest $request, RedSocial $redSocial)
    {
        $redSocial->update($request->validated());

        return new RedSocialResource($redSocial);
    }

    public function destroy(RedSocial $redSocial)
    {
        $redSocial->delete();

        return response()->json();
    }
}
