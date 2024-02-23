<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ReporteController;

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

Route::group(['prefix' => 'dev', 'namespace' => 'App\Http\Controllers', 'middleware' => 'auth:sanctum'], function() {
    /**
     * Rutas de ubicaciones
     */
    Route::apiResource('estados', 'Ubicaciones\EstadoController');
    Route::apiResource('municipios', 'Ubicaciones\MunicipioController');
    Route::apiResource('asentamientos', 'Ubicaciones\AsentamientoController');
    Route::apiResource('direcciones', 'Ubicaciones\DireccionController');

    /**
     * Rutas sobre los Catálogos de las Desapariciones
     */
    Route::apiResource('areas', 'AreaController');
    Route::apiResource('hipotesis', 'HipotesisController');

    /**
     * Rutas sobre la desaparición de personas
     */
    Route::apiResource('desapariciones', 'DesaparicionController');
});
