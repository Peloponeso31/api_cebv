<?php

use App\Http\Controllers\AscendenciaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaracteristicasFisicasController;
use App\Http\Controllers\ColorCabelloController;
use App\Http\Controllers\ColorOjosController;
use App\Http\Controllers\ColorPielController;
use App\Http\Controllers\ComplexionController;
use App\Http\Controllers\EtniaController;
use App\Http\Controllers\GrupoEtnicoController;
use App\Http\Controllers\LenguaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\Reportes\Hipotesis\CircunstanciaController;
use App\Http\Controllers\Reportes\Hipotesis\HipotesisController;
use App\Http\Controllers\Reportes\Hipotesis\TipoHipotesisController;
use App\Http\Controllers\Reportes\Informacion\AreaController;
use App\Http\Controllers\Reportes\Informacion\HechoDesaparicionController;
use App\Http\Controllers\Reportes\Informacion\MedioController;
use App\Http\Controllers\Reportes\Informacion\TipoMedioController;
use App\Http\Controllers\Reportes\ReporteController;
use App\Http\Controllers\Reportes\TipoReporteController;
use App\Http\Controllers\TamanoOjosController;
use App\Http\Controllers\TamanoOrejasController;
use App\Http\Controllers\TipoCabelloController;
use App\Http\Controllers\TipoLabiosController;
use App\Http\Controllers\TipoNarizController;
use App\Http\Controllers\Ubicaciones\AsentamientoController;
use App\Http\Controllers\Ubicaciones\DireccionController
use App\Http\Controllers\ContextoEconomicoController;
use App\Http\Controllers\DesaparicionController;
use App\Http\Controllers\Ubicaciones\EstadoController;
use App\Http\Controllers\Ubicaciones\MunicipioController;
use Illuminate\Support\Facades\Route;
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
     * Routes for ubicaciones module
     */
    Route::apiResource('/estados', EstadoController::class);
    Route::apiResource('/municipios', MunicipioController::class);
    Route::apiResource('/asentamientos', AsentamientoController::class);
    Route::apiResource('/direcciones', DireccionController::class);

    /**
     * Routes for the reportes module
     */
    Route::apiResource('/tipos-reportes', TipoReporteController::class);
    Route::apiResource('/reportes', ReporteController::class);

    /**
     * Routes for the informacion module
     */
    Route::apiResource('/areas', AreaController::class);
    Route::apiResource('/tipos-medios', TipoMedioController::class);
    Route::apiResource('/medios', MedioController::class);
    Route::apiResource('/hechos-desaparicion', HechoDesaparicionController::class);

    /*
     * Routes for the hipotesis module
     */
    Route::apiResource('/circunstancias', CircunstanciaController::class);
    Route::apiResource('/tipos-hipotesis', TipoHipotesisController::class);
    Route::apiResource('/hipotesis', HipotesisController::class);
    

    /**
     * Rutas sobre la desaparición de personas
     */
    Route::apiResource('/desapariciones', DesaparicionController::class);

    Route::apiResource("/contexto_economico", ContextoEconomicoController::class);

    Route::apiResource('caracteristicas_fisicas', CaracteristicasFisicasController::class);
    Route::apiResource('/color_cabello', ColorCabelloController::class);
    Route::apiResource('/color_ojos', ColorOjosController::class);
    Route::apiResource('/tamano_ojos', TamanoOjosController::class);
    Route::apiResource('/color_piel', ColorPielController::class);
    Route::apiResource('/tipo_cabello', TipoCabelloController::class);
    Route::apiResource('/tipo_labios', TipoLabiosController::class);
    Route::apiResource('/tipo_nariz', TipoNarizController::class);
    Route::apiResource('/tamano_orejas', TamanoOrejasController::class);
    Route::apiResource('/complexion', ComplexionController::class);


    Route::apiResource("etnia", EtniaController::class);
    Route::apiResource("/religion", ReligionController::class);
    Route::apiResource("/lengua", LenguaController::class);
    Route::apiResource("/grupo_etnico", GrupoEtnicoController::class);
    Route::apiResource("/vestimenta", VestimentaController::class);
    Route::apiResource("/ascendencia", AscendenciaController::class);
});

Route::controller(AuthController::class)->group(function () {
    Route::match(['get', 'post'], '/token', 'token');
});
