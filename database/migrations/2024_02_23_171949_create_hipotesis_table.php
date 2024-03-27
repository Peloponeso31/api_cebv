<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hipotesis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id');
            $table->foreignId('tipo_hipotesis_id')->constrained('tipos_hipotesis');
            $table->foreignId('sitio_id');
            $table->foreignId('area_asigna_sitio_id')->constrained('areas');

            $table->enum('etapa', ['Inicial', 'Final']);
            $table->text('descripcion');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hipotesis');
    }
};
