<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\Ubicaciones\EstadoController;
use App\Http\Controllers\Ubicaciones\MunicipioController;
use App\Http\Controllers\Ubicaciones\AsentamientoController;
use App\Http\Controllers\Ubicaciones\DireccionController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\HipotesisController;
use App\Http\Controllers\DesaparicionController;

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
    
    /**
     * Rutas de ubicaciones
     */
    Route::apiResource('/estados', EstadoController::class);
    Route::apiResource('/municipios', MunicipioController::class);
    Route::apiResource('/asentamientos', AsentamientoController::class);
    Route::apiResource('/direcciones', DireccionController::class);
    
    /**
     * Rutas sobre los Catálogos de las Desapariciones
     */
    Route::apiResource('/areas', AreaController::class);
    Route::apiResource('/hipotesis', HipotesisController::class);
    
    /**
     * Rutas sobre la desaparición de personas
     */
    Route::apiResource('/desapariciones', DesaparicionController::class);
});

Route::controller(AuthController::class)->group(function() {
    Route::match(['get', 'post'], '/issue-token', 'issue_token');
});

