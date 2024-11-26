<?php

use App\Http\Controllers\BoletinController;
use App\Http\Controllers\DocumentoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de reportes
|--------------------------------------------------------------------------
|
| Aqui es donde iran las rutas que esten relacionadas a la generacion de
| reportes en formato PDF.
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(DocumentoController::class)->prefix('documentos')->group(function () {
        Route::get('/informe-inicio/{desaparecido_id}', 'informeInicio');
        Route::get('/oficio-c4/{id}', 'oficioC4');
        Route::get('/oficio-cei/{id}', 'oficioparacei');
        Route::get('/oficio-fiscalia/{id}', 'oficioparafiscalia');
        Route::get('/oficio-ssa/{id}', 'oficioparassa');
        Route::get('/ficha-datos/{id}', 'fichaDatos');
        Route::get('/ficha-busqueda-inmediata/{id}', 'fichaBusquedaInmediata');
    });

    Route::controller(BoletinController::class)->prefix('boletines')->group(function () {
        Route::get('/busqueda-inmediata/{id}', 'busquedaInmediata');
    });
});
