<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('expedientes_fisicos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('area_receptora_id')->nullable()->constrained(table: 'cat_areas');
            $table->foreignId('solicitante_expediente_id')->nullable()->constrained(table: 'users');

            $table->dateTime('fecha_cambio_area')->nullable();
            $table->dateTime('fecha_prestamo')->nullable();
            $table->dateTime('fecha_devolucion')->nullable();
            $table->text('observaciones')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expedientes_fisicos');
    }
};
