<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('media_filiacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("persona_id");
            $table->foreignId("ausencia_dientes_id");
            $table->foreignId("tratamiento_dental_id");
            $table->foreignId("tipo_menton_id");
            $table->foreignId("especificacion_menton_id");
            $table->foreignId("region_deformacion_id");
            $table->foreignId("especificacion_deformacion_id");
            $table->foreignId("intervencion_quirurgica_id");
            $table->foreignId("especificacion_intervencion_quirurgica_id");
            $table->foreignId("tipo_enfermedad_piel_id");
            $table->foreignId("especificacion_enfermedad_id");
            $table->foreignId("observaciones_generales_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_filiacions');
    }
};
