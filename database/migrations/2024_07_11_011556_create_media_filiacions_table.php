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
            $table->foreignId("persona_id")->nullable();

            //Perfil corporal
            $table->integer("estatura")->nullable(); // Estatura en centimetros
            $table->integer("peso")->nullable(); // Peso en kilogramos
            $table->foreignId("complexion_id")->nullable();
            $table->foreignId("color_piel_id")->nullable();
            $table->foreignId("forma_cara_id")->nullable();

            //Ojos
            $table->foreignId("color_ojos_id")->nullable();
            $table->foreignId("forma_ojos_id")->nullable();
            $table->foreignId("tamano_ojos_id")->nullable();
            $table->text("observaciones_ojos")->nullable();

            //Cabello
            $table->foreignId("calvicie_id")->nullable();
            $table->foreignId("color_cabello_id")->nullable();
            $table->foreignId("tamano_cabello_id")->nullable();
            $table->foreignId("tipo_cabello_id")->nullable();
            $table->text("observaciones_cabello")->nullable();

            //Vello facial
            $table->foreignId("tipo_ceja_id")->nullable();
            $table->enum("bigote", ["Si", "No", "No Especifica"])->nullable();
            $table->enum("barba", ["Si", "No", "No Especifica"])->nullable();
            $table->text("observaciones_cejas")->nullable();
            $table->text("observaciones_barba")->nullable();
            $table->text("observaciones_bigote")->nullable();

            //Nariz
            $table->foreignId("tipo_nariz_id")->nullable();
            $table->text("observaciones_nariz")->nullable();

            //Boca
            $table->foreignId("tamano_boca_id")->nullable();
            $table->foreignId("tamano_labios_id")->nullable();
            $table->text("observaciones_boca")->nullable();

            //Oreja
            $table->foreignId("tamano_orejas_id")->nullable();
            $table->foreignId("forma_orejas_id")->nullable();
            $table->text("observaciones_oreja")->nullable();

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
