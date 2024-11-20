<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Tabla para almacenar datos complementarios de un reporte,
        // se espera que aumenten los campos en el futuro.
        Schema::create('datos_complementarios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('direccion_id')->nullable()->constrained(table: 'direcciones');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('datos_complementarios');
    }
};
