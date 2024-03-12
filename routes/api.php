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
use App\Http\Controllers\RegionCuerpoController;
use App\Http\Controllers\RegionCuerpoRnpdnoController;
use App\Http\Controllers\SenasParticularesController;
use App\Http\Controllers\UserAdminController;

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

/**
 * Rutas protegidas por autenticacion.
 */
Route::middleware('auth:sanctum')->group(function () {
    Route::controller(ReporteController::class)->group(function () {
        Route::get('/reportes', 'obtener');
    });

    Route::get('/user', function() {
        return Auth::user();
    });

    /*
     * Funcionamiento de los API resources:
     * Verbo         Ruta                        Acción     Nombre de la ruta
     * GET           /users                      index      users.index
     * POST          /users                      store      users.store
     * GET           /users/{user}               show       users.show
     * PUT|PATCH     /users/{user}               update     users.update
     * DELETE        /users/{user}               destroy    users.destroy
     */

    Route::apiResource('/usuario', UserAdminController::class);
    Route::apiResource("/persona", PersonaController::class);

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
    
    Route::apiResource('/senas_particulares', SenasParticularesController::class);
    Route::apiResource('/catalogos/region_cuerpo', RegionCuerpoController::class);
    Route::apiResource('/catalogos/region_cuerpo_rnpdno', RegionCuerpoRnpdnoController::class);
});

Route::controller(AuthController::class)->group(function () {
    Route::match(['get', 'post'], '/token', 'token');
});
