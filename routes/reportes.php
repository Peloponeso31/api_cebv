<?php

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

    Route::get("/ficha_de_datos", function () {
        return Pdf::loadView("reportes.ficha_de_datos")->stream();
    });

    
    Route::get("/caratulas", function () {
        return Pdf::loadView("reportes.Caratula")->stream();
    });
    
    Route::get("/boletines", function () {
        return Pdf::loadView("reportes.boletin_BI")->stream();
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
});