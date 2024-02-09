<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return [Auth::user(), Auth::user()->tokens()];
});

Route::middleware('auth:sanctum')->get('/user/posts', function (Request $request) {
    // Al utilizar eloquent y devolver json necesitas usar "get()" al final para realizar la colección.
    // Mira los modelos de User y Posts, asi como la migracion de posts para mas detalles.
    return Auth::user()->posts()->get();
});

Route::middleware('auth:sanctum')->group(function() {
    Route::controller(PersonaController::class)->group(function() {

    });
});

Route::controller(AuthController::class)->group(function() {
    Route::match(['get', 'post'], '/issue-token', 'issue_token');
});


