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
        Schema::create('medias_filiaciones', function (Blueprint $table) {
            $table->id();
            $table->integer("estatura")->nullable(); // Estatura en centimetros
            $table->integer("peso")->nullable(); // Peso en kilogramos
            $table->foreignId("persona_id")->nullable();
            $table->foreignId("complexion_id")->nullable();
            $table->foreignId("color_piel_id")->nullable();
            $table->foreignId("color_ojos_id")->nullable();
            $table->foreignId("color_cabello_id")->nullable();
            $table->foreignId("tamano_cabello_id")->nullable();
            $table->foreignId("tipo_cabello_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias_filiaciones');
    }
};
