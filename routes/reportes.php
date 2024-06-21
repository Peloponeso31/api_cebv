<?php

use App\Models\Reportes\Relaciones\Desaparecido;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
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

Route::middleware('auth:sanctum')->group(function() {

    Route::get("/informe_de_inicio/{id}", function ($id) {
        $reporte = Reporte::findOrFail($id);
        return Pdf::loadView("reportes.informe_de_inicio", ["reporte" => $reporte])->stream($reporte->folio.".pdf");
    });

    Route::get("/informes-inicios/{id}", function (string $id) {
        $desaparecido =  Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.informe_inicio", [
            "desaparecido" => $desaparecido
        ])->stream();
    });

    Route::get("/ficha_de_datos", function () {
        return Pdf::loadView("reportes.ficha_de_datos")->stream();
    });

    Route::get("/fichas-bis/{id}", function (string $id) {
        $desaparecido =  Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.ficha_bi", [
            "desaparecido" => $desaparecido
        ])->stream();
    });

    Route::get("/fichas-bis-copys/{id}", function (string $id) {
        $desaparecido =  Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.ficha_bi_copy", [
            "desaparecido" => $desaparecido
        ])->stream();
    });

    Route::get("/fichas-lds/{id}", function (string $id) {
        $desaparecido =  Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.ficha_ld", [
            "desaparecido" => $desaparecido
        ])->stream();
    });

    Route::get("/fichas-lds-copys/{id}", function (string $id) {
        $desaparecido =  Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.ficha_ld_copy", [
            "desaparecido" => $desaparecido
        ])->stream();
    });

    
    Route::get("/caratulas/{id}", function (string $id) {
        $desaparecido =  Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.Caratula", [
            "desaparecido" => $desaparecido
        ])->stream();
    });
    
    Route::get("/boletines/{id}", function (string $id, Request $request) {
        $desaparecido =  Desaparecido::whereId($id)->first();
        $tamanoPapel = [0.0, 0.0, 2215, 2215];


        return Pdf::loadView("reportes.boletin_BI", 
        [
            "desaparecido" => $desaparecido
        ])->setPaper($tamanoPapel)->stream();
    });

    Route::get("/boletines-lds/{id}", function (string $id) {
        $desaparecido =  Desaparecido::findOrFail($id);
        $tamanoPapel = [0.0, 0.0, 2215, 2215];

        return Pdf::loadView("reportes.boletin_LD", 
        [
            "desaparecido" => $desaparecido
        ])->setPaper($tamanoPapel)->stream();
    });

    Route::get("/boletines-uis/{id}", function (string $id) {
        $desaparecido =  Desaparecido::whereId($id)->first();
        $tamanoPapel = [0.0, 0.0, 1238, 956];

        return Pdf::loadView("reportes.boletin_UI", 
        [
            "desaparecido" => $desaparecido
        ])->setPaper($tamanoPapel)->stream();
    });
    
    Route::get("/indicaciones", function () {
        return Pdf::loadView("reportes.indicaciones_C4")->stream();
    });
    
    Route::get("/oficios-ceis", function () {
        return Pdf::loadView("reportes.oficio_CEI")->stream();
    });

    Route::get("/oficios-fiscalias", function () {
        return Pdf::loadView("reportes.oficio_fiscalia")->stream();
    });

    Route::get("/oficios-ssas", function () {
        return Pdf::loadView("reportes.oficios_SSA")->stream();
    });

    Route::get("/tarjetas-folios", function () {
        $tamanoPapel = [0.0, 0.0, 595.28, 420.945];
        return Pdf::loadView("reportes.tarjeta_de_folio")->setPaper($tamanoPapel)->stream();
    });

    Route::get("/informes-loacalizaciones/{id}", function (string $id) {
        $desaparecido =  Desaparecido::whereId($id)->first();
        return Pdf::loadView("reportes.informe_localizacion", [
            "desaparecido" => $desaparecido
        ])->stream();
    });
});