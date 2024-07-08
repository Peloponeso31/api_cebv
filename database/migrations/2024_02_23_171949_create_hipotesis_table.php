<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hipotesis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('tipo_hipotesis_id')->constrained(table: 'tipos_hipotesis');
            $table->foreignId('sitio_id')->constrained(table: 'sitios');
            $table->foreignId('area_asigna_sitio_id')->constrained(table: 'areas');

            $table->enum('etapa', ['Inicial', 'Final']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hipotesis');
    }
};
