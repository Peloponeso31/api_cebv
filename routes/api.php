<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AscendenciaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Informaciones\MedioController;
use App\Http\Controllers\Informaciones\SitioController;
use App\Http\Controllers\Informaciones\TipoMedioController;
use App\Http\Controllers\Oficialidades\AreaController;
use App\Http\Controllers\Oficialidades\FolioController;
use App\Http\Controllers\Oficialidades\InstitucionController;
use App\Http\Controllers\Personas\EstatusPersonaController;
use App\Http\Controllers\Personas\ParentescoController;
use App\Http\Controllers\Personas\PersonaController;
use App\Http\Controllers\CaracteristicasFisicasController;
use App\Http\Controllers\Catalogos\LadoController;
use App\Http\Controllers\Catalogos\LadoRnpdnoController;
use App\Http\Controllers\Catalogos\RegionCuerpoController;
use App\Http\Controllers\Catalogos\RegionCuerpoRnpdnoController;
use App\Http\Controllers\Catalogos\VistaController;
use App\Http\Controllers\Catalogos\VistaRnpdnoController;
use App\Http\Controllers\Catalogos\TipoController;
use App\Http\Controllers\RegionVellofacialController;
use App\Http\Controllers\ColorVellofacialController;
use App\Http\Controllers\CorteVellofacialController;
use App\Http\Controllers\VolumenVellofacialController;
use App\Http\Controllers\VelloFacialController;
use App\Http\Controllers\ProyeccionMentonController;
use App\Http\Controllers\TipoProyeccionMentonController;
use App\Http\Controllers\TipoPabellonAuricularController;
use App\Http\Controllers\ModificacionPabellonAuricularController;
use App\Http\Controllers\PabellonAuricularController;
use App\Http\Controllers\TipoCejaController;
use App\Http\Controllers\CejaController;
use App\Http\Controllers\TamanoBocaController;
use App\Http\Controllers\FormaOjoController;
use App\Http\Controllers\TipoCalvicieController;
use App\Http\Controllers\ModificacionCabelloController;
use App\Http\Controllers\TamanoCabelloController;
use App\Http\Controllers\ColorCabelloController;
use App\Http\Controllers\ColorOjosController;
use App\Http\Controllers\ColorPielController;
use App\Http\Controllers\CompaniaTelefonicaController;
use App\Http\Controllers\ComplexionController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\EtniaController;
use App\Http\Controllers\GrupoEtnicoController;
use App\Http\Controllers\LenguaController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\Reportes\Hipotesis\CircunstanciaController;
use App\Http\Controllers\Reportes\Hipotesis\HipotesisController;
use App\Http\Controllers\Reportes\Hipotesis\TipoHipotesisController;
use App\Http\Controllers\Reportes\Hechos\HechoDesaparicionController;
use App\Http\Controllers\Reportes\Relaciones\DesaparecidoController;
use App\Http\Controllers\Reportes\Relaciones\ReportanteController;
use App\Http\Controllers\Reportes\ReporteController;
use App\Http\Controllers\Reportes\TipoReporteController;
use App\Http\Controllers\TamanoOjosController;
use App\Http\Controllers\TamanoOrejasController;
use App\Http\Controllers\TipoCabelloController;
use App\Http\Controllers\TipoLabiosController;
use App\Http\Controllers\TipoNarizController;
use App\Http\Controllers\Ubicaciones\AsentamientoController;
use App\Http\Controllers\Ubicaciones\DireccionController;
use App\Http\Controllers\ContextoEconomicoController;
use App\Http\Controllers\ContextoFamiliarController;
use App\Http\Controllers\ContextoSocialController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\SenasParticularesController;
use App\Http\Controllers\TelefonoController;
use App\Http\Controllers\Ubicaciones\EstadoController;
use App\Http\Controllers\Ubicaciones\MunicipioController;
use App\Http\Controllers\Ubicaciones\ZonaEstadoController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\VestimentaController;
use App\Http\Resources\UserAdminResource;


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
    Route::get('/usuario_actual', function() {
        return new UserAdminResource(Auth::user());
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

    /**
     * Routes for the informaciones module
     */
    Route::apiResource('/medios', MedioController::class);
    Route::apiResource('/tipos-medios', TipoMedioController::class);
    Route::apiResource('/sitios', SitioController::class);
    Route::apiResource("/Empleado", EmpleadoController::class);
    Route::apiResource("/Oficina", OficinaController::class);

    /**
     * Routes for the oficialidades module
     */
    Route::apiResource('/areas', AreaController::class);
    Route::apiResource('/instituciones', InstitucionController::class);
    Route::apiResource('/folios', FolioController::class);

    /**
     * Routes for personas module
     */
    Route::apiResource('/estatus-personas', EstatusPersonaController::class);
    Route::apiResource('/parentescos', ParentescoController::class);
    Route::apiResource("/persona", PersonaController::class);
    Route::apiResource("/CompaniaTelefonica", CompaniaTelefonicaController::class);
    Route::apiResource("/Telefono", TelefonoController::class);
    Route::apiResource("/Contacto", ContactoController::class);

    /**
     * Routes for the reportes module
     */
    Route::apiResource('/tipos-reportes', TipoReporteController::class);
    Route::apiResource('/reportes', ReporteController::class);

    /**
     * Routes for the informacion module
     */
    Route::apiResource('/tipos-medios', TipoMedioController::class);
    Route::apiResource('/medios', MedioController::class);
    Route::apiResource('/hechos-desaparicion', HechoDesaparicionController::class);

    Route::apiResource('/circunstancias', CircunstanciaController::class);
    Route::apiResource('/tipos-hipotesis', TipoHipotesisController::class);
    Route::apiResource('/hipotesis', HipotesisController::class);
    
    Route::apiResource('/reportantes', ReportanteController::class);
    Route::apiResource('/desaparecidos', DesaparecidoController::class);

    /**
     * Routes for ubicaciones module
     */
    Route::apiResource('/estados', EstadoController::class);
    Route::apiResource('/municipios', MunicipioController::class);
    Route::apiResource('/asentamientos', AsentamientoController::class);
    Route::apiResource('/direcciones', DireccionController::class);
    Route::apiResource('/zonas-estados', ZonaEstadoController::class);
    Route::apiResource('/senas_particulares', SenasParticularesController::class);
    Route::post('/bulk_insert/senas_particulares', [SenasParticularesController::class, 'bulkStore']);
    Route::apiResource('/catalogos/region_cuerpo', RegionCuerpoController::class);
    Route::apiResource('/catalogos/tipo',TipoController::class);
    Route::apiResource('/catalogos/vista',VistaController::class);
    Route::apiResource('/catalogos/lado',LadoController::class);
    Route::apiResource('/catalogos/vista_rnpdno',VistaRnpdnoController::class);
    Route::apiResource('/catalogos/lado_rnpdno',LadoRnpdnoController::class);
    Route::apiResource('/catalogos/region_cuerpo_rnpdno', RegionCuerpoRnpdnoController::class);

    Route::apiResource("/contexto_social", ContextoSocialController::class);
    Route::apiResource("/contexto_economico", ContextoEconomicoController::class);
    Route::apiResource("/contexto_familiar", ContextoFamiliarController::class);

    Route::apiResource('/caracteristicas_fisicas', CaracteristicasFisicasController::class);
    Route::apiResource('/color_cabello', ColorCabelloController::class);
    Route::apiResource('/color_ojos', ColorOjosController::class);
    Route::apiResource('/tamano_ojos', TamanoOjosController::class);
    Route::apiResource('/color_piel', ColorPielController::class);
    Route::apiResource('/tipo_cabello', TipoCabelloController::class);
    Route::apiResource('/tipo_labios', TipoLabiosController::class);
    Route::apiResource('/tipo_nariz', TipoNarizController::class);
    Route::apiResource('/tamano_orejas', TamanoOrejasController::class);
    Route::apiResource('/complexion', ComplexionController::class);


    Route::apiResource("/etnia", EtniaController::class);
    Route::apiResource("/religion", ReligionController::class);
    Route::apiResource("/lengua", LenguaController::class);
    Route::apiResource("/grupo_etnico", GrupoEtnicoController::class);
    Route::apiResource("/vestimenta", VestimentaController::class);
    Route::apiResource("/ascendencia", AscendenciaController::class);

    Route::apiResource("/velloFacial", VelloFacialController::class);
    Route::apiResource("/regionvello", RegionVelloFacialController::class);
    Route::apiResource("/colorvello", ColorVelloFacialController::class);
    Route::apiResource("/cortevello", CorteVelloFacialController::class);
    Route::apiResource("/volumenvello", VolumenVelloFacialController::class);

    Route::apiResource("/proyeccionmenton", ProyeccionMentonController::class);
    Route::apiResource("/tipoproyeccionmenton", TipoProyeccionMentonController::class);

    Route::apiResource("/pabellonauricular", PabellonAuricularController::class);
    Route::apiResource("/tipopabellonauricular", TipoPabellonAuricularController::class);
    Route::apiResource("/modificacionpabellonauricular", ModificacionPabellonAuricularController::class);

    Route::apiResource("/ceja", CejaController::class);
    Route::apiResource("/tipoceja", TipoCejaController::class);

    Route::apiResource("/tamanoboca", TamanoBocaController::class);

    Route::apiResource("/formaojo", FormaOjoController::class);

    Route::apiResource("/tipocalvicie", TipoCalvicieController::class);

    Route::apiResource("/modificacioncabello", ModificacioncabelloController::class);

    Route::apiResource("/tamanocabello", TamanoCabelloController::class);
});

Route::controller(AuthController::class)->group(function () {
    Route::match(['get', 'post'], '/token', 'token');
});

