<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\Reportes\AreaController;
use App\Http\Controllers\Reportes\Hipotesis\CircunstanciaController;
use App\Http\Controllers\Reportes\Informacion\HechoDesaparicionController;
use App\Http\Controllers\Reportes\Hipotesis\HipotesisController;
use App\Http\Controllers\Reportes\ReporteController;
use App\Http\Controllers\Ubicaciones\AsentamientoController;
use App\Http\Controllers\Ubicaciones\DireccionController;
use App\Http\Controllers\Ubicaciones\EstadoController;
use App\Http\Controllers\Ubicaciones\MunicipioController;
use Illuminate\Support\Facades\Route;

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
     * Routes for the reportes module
     */
    Route::apiResource('/areas', AreaController::class);

    /**
     * Routes for the hechos de desaparicion module
     */
    Route::apiResource('/hechos-desaparicion', HechoDesaparicionController::class);

    /*
     * Routes for the hipotesis module
     */
    Route::apiResource('/circunstancias', CircunstanciaController::class);
    Route::apiResource('/hipotesis', HipotesisController::class);

});

Route::controller(AuthController::class)->group(function() {
    Route::match(['get', 'post'], '/issue-token', 'issue_token');
});

