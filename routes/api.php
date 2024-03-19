<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\InformacionConyugalController;


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

Route::middleware('auth:sanctum')->group(function() {
    Route::controller(PersonaController::class)->group(function() {
        // Singular
        Route::get('/persona', 'obtener');
        Route::post('/persona', 'crear');
        Route::delete('/persona', 'borrar');
        // Plural
        Route::get('/personas', 'consultar');
        Route::post('/personas', 'crearVarios');
    });

    Route::controller(ReporteController::class)->group(function() {
        Route::get('/reportes', 'obtener');
    });
});

Route::controller(AuthController::class)->group(function() {
    Route::match(['get', 'post'], '/issue-token', 'issue_token');
});

Route::controller(InformacionConyugalController::class)->group(function() {
    Route::match(['get', 'post'], '/issue-token', 'issue_token');
});
