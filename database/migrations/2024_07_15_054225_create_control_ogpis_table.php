<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('control_ogpis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('estatus_rndpno_id')->nullable()->constrained(table: 'cat_estatus_personas');

            $table->string('folio_fub')->nullable();
            $table->string('autoridad_ingresa_fub')->nullable();
            $table->dateTime('fecha_codificacion');
            $table->string('nombre_codificador');
            $table->string('observaciones')->nullable();
            $table->string('numero_tarjeta');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('control_ogpis');
    }
};
