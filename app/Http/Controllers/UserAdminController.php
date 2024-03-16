<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserAdminResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserAdminResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        return new UserAdminResource(User::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new UserAdminResource(User::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::findOrFail($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
    }
}
