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
        Schema::create('caracteristicas_fisicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("persona_id");
            $table->foreignId("color_cabello_id");
            $table->foreignId("color_ojos_id");
            $table->foreignId("tamano_ojos_id");
            $table->foreignId("color_piel_id");
            $table->foreignId("tipo_cabello_id");
            $table->foreignId("tipo_labios_id");
            $table->foreignId("tipo_nariz_id");
            $table->foreignId("tamano_orejas_id");
            $table->foreignId("complexion_id");
            $table->foreignId("barba_id");
            $table->foreignId("bigote_id");
            $table->foreignId("calvicie_id");
            $table->foreignId("especificacion_barba_id");
            $table->foreignId("especificacion_bigote_id");
            $table->foreignId("especificacion_cabello_id");
            $table->foreignId("especificacion_nariz_id");
            $table->foreignId("especificacion_ojos_id");
            $table->foreignId("especificacion_oreja_id");
            $table->foreignId("estatura_id");
            $table->foreignId("forma_cara_id");
            $table->foreignId("forma_ojos_id");
            $table->foreignId("forma_oreja_id");
            $table->foreignId("peso_id");
            $table->foreignId("tamano_boca_id");
            $table->foreignId("tamano_cabello_id");
            $table->foreignId("tipo_ceja_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caracteristicas_fisicas');
    }
};
