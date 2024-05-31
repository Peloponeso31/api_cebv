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
            $table->timestamps();
            // TODO: Agregar atributos y catalogos definidos en la pestana de media filiacion.
            // TODO: Generar modelo de media filiacion complementaria con los atributos descritos en la pestana con el mismo nombre.

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
