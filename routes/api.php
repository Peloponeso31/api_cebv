<?php

use App\Http\Controllers\ApodoController;
use App\Http\Controllers\EscolaridadController;
use App\Http\Controllers\EstadoConyugalController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\MarcaVehiculoController;
use App\Http\Controllers\NacionalidadController;
use App\Http\Controllers\RelacionVehiculoController;
use App\Http\Controllers\Reportes\Relaciones\DocumentoLegalController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\TipoVehiculoController;
use App\Http\Controllers\UsoVehiculoController;
use App\Models\MarcaVehiculo;
use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\MediaFiliacionController;
use App\Http\Controllers\RegionVellofacialController;
use App\Http\Controllers\ColorVellofacialController;
use App\Http\Controllers\CorteVellofacialController;
use App\Http\Controllers\VolumenVellofacialController;
use App\Http\Controllers\VelloFacialController;
use App\Http\Controllers\EtniaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CompaniaTelefonicaController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\ColorCabelloController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\ColorOjosController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\ColorPielController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\ComplexionController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\TamanoOjosController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\TamanoOrejasController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\TipoCabelloController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\TipoLabiosController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\TipoNarizController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\BarbaController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\BigoteController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\CalvicieController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\EspecificacionBarbaController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\EspecificacionBigoteController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\EspecificacionCabelloController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\EspecificacionNarizController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\EspecificacionOjosController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\EspecificacionOrejaController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\EstaturaController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\FormaCaraController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\FormaOjosController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\FormaOrejaController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\PesoController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\TamanoBocaController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\TamanoCabelloController;
use App\Http\Controllers\Catalogos\CaracteristicaFisicas\TipoCejaController;
use App\Http\Controllers\Catalogos\MediaFiliacion\AusenciaDientesController;
use App\Http\Controllers\Catalogos\MediaFiliacion\TratamientoDentalController;
use App\Http\Controllers\Catalogos\MediaFiliacion\TipoMentonController;
use App\Http\Controllers\Catalogos\MediaFiliacion\EspecificacionMentonController;
use App\Http\Controllers\Catalogos\MediaFiliacion\RegionDeformacionController;
use App\Http\Controllers\Catalogos\MediaFiliacion\EspecificacionDeformacionController;
use App\Http\Controllers\Catalogos\MediaFiliacion\IntervencionQuirurgicaController;
use App\Http\Controllers\Catalogos\MediaFiliacion\EspecificacionIntervencionQuirurgicaController;
use App\Http\Controllers\Catalogos\MediaFiliacion\TipoEnfermedadPielController;
use App\Http\Controllers\Catalogos\MediaFiliacion\EspecificacionEnfermedadController;
use App\Http\Controllers\Catalogos\MediaFiliacion\ObservacionesGeneralesController;
use App\Http\Controllers\Catalogos\Etnia\AscendenciaController;
use App\Http\Controllers\Catalogos\Etnia\GrupoEtnicoController;
use App\Http\Controllers\Catalogos\Etnia\LenguaController;
use App\Http\Controllers\Catalogos\Etnia\ReligionController;
use App\Http\Controllers\Catalogos\Etnia\VestimentaController;
use App\Http\Controllers\Catalogos\SenasParticulares\LadoController;
use App\Http\Controllers\Catalogos\SenasParticulares\RegionCuerpoController;
use App\Http\Controllers\Catalogos\SenasParticulares\TipoController;
use App\Http\Controllers\Catalogos\SenasParticulares\VistaController;
use App\Http\Controllers\Catalogos\SenasParticularesRnpdno\LadoRnpdnoController;
use App\Http\Controllers\Catalogos\SenasParticularesRnpdno\RegionCuerpoRnpdnoController;
use App\Http\Controllers\Catalogos\SenasParticularesRnpdno\VistaRnpdnoController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\Reportes\Hipotesis\CircunstanciaController;
use App\Http\Controllers\Reportes\Hipotesis\HipotesisController;
use App\Http\Controllers\Reportes\Hipotesis\TipoHipotesisController;
use App\Http\Controllers\Reportes\Hechos\HechoDesaparicionController;
use App\Http\Controllers\Reportes\Relaciones\DesaparecidoController;
use App\Http\Controllers\Reportes\Relaciones\ReportanteController;
use App\Http\Controllers\Reportes\ReporteController;
use App\Http\Controllers\Reportes\TipoReporteController;
use App\Http\Controllers\Ubicaciones\AsentamientoController;
use App\Http\Controllers\Ubicaciones\DireccionController;
use App\Http\Controllers\ContextoEconomicoController;
use App\Http\Controllers\ContextoFamiliarController;
use App\Http\Controllers\ContextoSocialController;
use App\Http\Controllers\Empleado\EmpleadoController;
use App\Http\Controllers\GrupoPertenenciaController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\PertenenciaController;
use App\Http\Controllers\PrendaDeVestirController;
use App\Http\Controllers\SenasParticularesController;
use App\Http\Controllers\TelefonoController;
use App\Http\Controllers\Ubicaciones\EstadoController;
use App\Http\Controllers\Ubicaciones\MunicipioController;
use App\Http\Controllers\Ubicaciones\ZonaEstadoController;
use App\Http\Controllers\UserAdminController;
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
Route::middleware('auth:sanctum')->group(callback: function () {
    Route::get('/usuario_actual', function () {
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
    Route::apiResource('/estados-conyugales', EstadoConyugalController::class);
    Route::apiResource('/escolaridades', EscolaridadController::class);
    Route::apiResource('/parentescos', ParentescoController::class);
    Route::apiResource('/personas', PersonaController::class);
    Route::apiResource('/generos', GeneroController::class);
    Route::apiResource('/sexos', SexoController::class);
    Route::apiResource('/companias-telefonicas', CompaniaTelefonicaController::class);
    Route::apiResource('/telefonos', TelefonoController::class);
    Route::apiResource('/contactos', ContactoController::class);
    Route::apiResource('/apodos', ApodoController::class);
    Route::apiResource('/nacionalidades', NacionalidadController::class);
    Route::post('/personas/{personaId}/nacionalidades/{nacionalidadId}', [PersonaController::class, 'addNacionality']);
    Route::delete('/personas/{personaId}/nacionalidades/{nacionalidadId}', [PersonaController::class, 'removeNacionality']);

    /**
     * Routes for the reportes module
     */
    Route::get('/vista/reportes', [ReporteController::class, 'vistaReportesDashboard']);
    Route::get('/reportes/asignar_folio/{id}', [ReporteController::class, 'setFolio']);
    Route::get('/reportes/ver_folio/{id}', [ReporteController::class, 'getFolios']);
    Route::apiResource('/reportes', ReporteController::class);
    Route::apiResource('/tipos-reportes', TipoReporteController::class);


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
    Route::get('/vista/reportantes/{id}', [ReportanteController::class, 'vista']);
    Route::apiResource('/desaparecidos', DesaparecidoController::class);
    Route::get('/desaparecidos_folio', [DesaparecidoController::class, 'desaparecido_persona_folio']);
    Route::apiResource('/documentos-legales', DocumentoLegalController::class);

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
    Route::delete('/bulk_delete/senas_particulares', [SenasParticularesController::class, 'bulkDelete']);
    Route::get('/sena/persona/{persona_id}', [SenasParticularesController::class, 'SenaPersona']);

    Route::apiResource('/catalogos/region_cuerpo', RegionCuerpoController::class);
    Route::apiResource('/catalogos/tipo', TipoController::class);
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
    Route::apiResource('/barba', BarbaController::class);
    Route::apiResource('/bigote', BigoteController::class);
    Route::apiResource('/calvicie', CalvicieController::class);
    Route::apiResource('/especificacion_barba', EspecificacionBarbaController::class);
    Route::apiResource('/especificacion_bigote', EspecificacionBigoteController::class);
    Route::apiResource('/especificacion_cabello', EspecificacionCabelloController::class);
    Route::apiResource('/especificacion_nariz', EspecificacionNarizController::class);
    Route::apiResource('/especificacion_ojos', EspecificacionOjosController::class);
    Route::apiResource('/especificacion_oreja', EspecificacionOrejaController::class);
    Route::apiResource('/estatura', EstaturaController::class);
    Route::apiResource('/forma_cara', FormaCaraController::class);
    Route::apiResource('/forma_ojos', FormaOjosController::class);
    Route::apiResource('/forma_oreja', FormaOrejaController::class);
    Route::apiResource('/peso', PesoController::class);
    Route::apiResource('/tamano_boca', TamanoBocaController::class);
    Route::apiResource('/tamano_cabello', TamanoCabelloController::class);
    Route::apiResource('/tipo_ceja', TipoCejaController::class);

     /**
     * Routes for mediaFiliacion module
     */
    Route::apiResource('/media_filiacion', MediaFiliacionController::class);
    Route::apiResource('/ausencia_dientes', AusenciaDientesController::class);
    Route::apiResource('/tratamiento_dental', TratamientoDentalController::class);
    Route::apiResource('/tipo_menton', TipoMentonController::class);
    Route::apiResource('/especificacion_menton', EspecificacionMentonController::class);
    Route::apiResource('/region_deformacion', RegionDeformacionController::class);
    Route::apiResource('/especificacion_deformacion', EspecificacionDeformacionController::class);
    Route::apiResource('/intervencion_quirurgica', IntervencionQuirurgicaController::class);
    Route::apiResource('/especificacion_intervencion', EspecificacionIntervencionQuirurgicaController::class);
    Route::apiResource('/tipo_enfermedad_piel', TipoEnfermedadPielController::class);
    Route::apiResource('/especificacion_enfermedad', EspecificacionEnfermedadController::class);
    Route::apiResource('/observaciones_generales', ObservacionesGeneralesController::class);

    Route::apiResource("/etnia", EtniaController::class);
    Route::apiResource("/religion", ReligionController::class);
    Route::apiResource("/lengua", LenguaController::class);
    Route::apiResource("/grupo_etnico", GrupoEtnicoController::class);
    Route::apiResource("/vestimenta", VestimentaController::class);
    Route::apiResource("/ascendencia", AscendenciaController::class);

    /**
     * Routes for señas particulares module
     */
    Route::apiResource("/prenda_de_vestir", PrendaDeVestirController::class);
    Route::apiResource("/grupo_pertenencia", GrupoPertenenciaController::class);
    Route::apiResource("/pertenencia", PertenenciaController::class);
    Route::apiResource("/color", ColorController::class);

    Route::apiResource("/velloFacial", VelloFacialController::class);
    Route::apiResource("/regionvello", RegionVelloFacialController::class);
    Route::apiResource("/colorvello", ColorVelloFacialController::class);
    Route::apiResource("/cortevello", CorteVelloFacialController::class);
    Route::apiResource("/volumenvello", VolumenVelloFacialController::class);

    /**
     * Routes for the Vehiculos module
     */

    Route::apiResource('/marcas-vehiculos', MarcaVehiculoController::class);
    Route::apiResource('/tipos-vehiculos', TipoVehiculoController::class);
    Route::apiResource('/usos-vehiculos', UsoVehiculoController::class);
    Route::apiResource('/relaciones-vehiculos', RelacionVehiculoController::class);

});

Route::controller(AuthController::class)->group(function () {
    Route::match(['get', 'post'], '/token', 'token');
});

