<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserAdminResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Models\UserActionLog;

class UserAdminController extends Controller
{
    
    public function index()
    {
        return UserAdminResource::collection(User::all());
    }

    
    public function store(StoreUserRequest $request)
    {
        return new UserAdminResource(User::create($request->all()));
    }

    
    public function show(string $id)
    {
        return new UserAdminResource(User::findOrFail($id));
    }

  
    public function update(Request $request, string $id)
    {
        User::findOrFail($id)->update($request->all());
    }

    
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
    }

    /**
     * Suspender un usuario especifico
     */
    public function suspend(string $id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Suspendido';
        $user->save();

        // Registrar la acción de suspensión en la tabla de registros de acciones de usuario
        UserActionLog::create([
            'user_id' => $user->id,
            'action' => 'suspender',
        ]);

        return new UserAdminResource($user);
    }

    /**
     * Activar usuario especifico 
     */
    public function activate(string $id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Activo';
        $user->save();

        // Registrar la acción de activación en la tabla de registros de acciones de usuario
        UserActionLog::create([
            'user_id' => $user->id,
            'action' => 'activar',
        ]);

        return new UserAdminResource($user);
    }


}
