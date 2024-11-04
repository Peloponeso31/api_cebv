<?php

use App\Http\Controllers\DocumentoController;
use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Relaciones\Reportante;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Reportes\Reporte;

/*
|--------------------------------------------------------------------------
| Rutas de reportes
|--------------------------------------------------------------------------
|
| Aqui es donde iran las rutas que esten relacionadas a la generacion de
| reportes en formato PDF.
|
*/

Route::controller(DocumentoController::class)->group(function () {
    Route::get('/documentos/informes-inicio/{desaparecido_id}', 'informeInicio');
});

Route::middleware('auth:sanctum')->group(function ()
{


    Route::get("/ficha_de_datos", function () {
        return Pdf::loadView("reportes.ficha_de_datos")->stream();
    });

    Route::get("/fichas-bis-copys/{id}", function (string $id) {
        $desaparecido = Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.ficha_bi_copy", [
            "desaparecido" => $desaparecido
        ])->stream();
    });

    Route::get("/reportes-preliminares/{id}", function (string $id) {
        $desaparecido = Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.reporte_preliminar", [
            "desaparecido" => $desaparecido
        ])->stream();
    });

    Route::get("/caratulas/{id}", function (string $id) {
        $desaparecido = Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.Caratula", [
            "desaparecido" => $desaparecido
        ])->stream();
    });

    // Boletin de busqueda inmediata
    Route::get("/boletines/{id}", function (string $id, Request $request) {
        $desaparecido = Desaparecido::findOrFail($id);
        $reporte = Reporte::findOrFail($desaparecido->reporte_id);
        $reportante = Reportante::findOrFail($reporte->reportantes->first()->id);

        $folio = Folio::where([
            ["reporte_id", "=", $reporte->id],
            ["persona_id", "=", $desaparecido->persona->id]
        ])->first();

        $imagen = Storage::get($desaparecido->boletin_img_path);
        $tamanoPapel = [0.0, 0.0, 2215, 2215];

        return Pdf::loadView("reportes.boletin_BI", [
            "desaparecido" => $desaparecido,
            "imagen" => "data:image/jpg;base64," . base64_encode($imagen),
            "folio" => $folio,
            "senas" => $request->senas ?? null
        ])->setPaper($tamanoPapel)->stream();
    });

    Route::get("/boletines-lds/{id}", function (string $id) {
        $desaparecido = Desaparecido::findOrFail($id);
        $tamanoPapel = [0.0, 0.0, 2215, 2215];

        return Pdf::loadView("reportes.boletin_LD",
            [
                "desaparecido" => $desaparecido
            ])->setPaper($tamanoPapel)->stream();
    });

    Route::get("/boletines-uis/{id}", function (string $id) {
        $desaparecido = Desaparecido::whereId($id)->first();
        $tamanoPapel = [0.0, 0.0, 1238, 956];

        return Pdf::loadView("reportes.boletin_UI",
            [
                "desaparecido" => $desaparecido
            ])->setPaper($tamanoPapel)->stream();
    });

    Route::get("/indicaciones/{id}", function (string $id) {
        $desaparecido = Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.indicaciones_C4", [
            "desaparecido" => $desaparecido
        ])->stream();
    });

    Route::get("/oficios-ceis/{id}", function (string $id) {
        $desaparecido = Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.oficio_CEI", [
            "desaparecido" => $desaparecido
        ])->stream();
    });

    Route::get("/oficios-fiscalias/{id}", function (string $id) {
        $desaparecido = Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.oficio_fiscalia", [
            "desaparecido" => $desaparecido
        ])->stream();
    });

    Route::get("/oficios-ssas/{id}", function (string $id) {
        $desaparecido = Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.oficios_SSA", [
            "desaparecido" => $desaparecido
        ])->stream();
    });

    Route::get("/tarjetas-folios/{id}", function (string $id) {
        $desaparecido = Desaparecido::whereId($id)->first();
        $tamanoPapel = [0.0, 0.0, 595.28, 420.945];

        return Pdf::loadView("reportes.tarjeta_de_folio",
            [
                "desaparecido" => $desaparecido
            ])->setPaper($tamanoPapel)->stream();
    });

    Route::get("/informes-localizaciones/{id}", function (string $id) {
        $desaparecido = Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.informe_localizacion", [
            "desaparecido" => $desaparecido
        ])->stream();
    });
});
