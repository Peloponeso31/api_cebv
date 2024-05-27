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
        Schema::create('contexto_socials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id') -> constrained(table: 'personas');
            $table->string("pasatiempos")->nullable();
            $table->string("club_organizacion")->nullable();
            $table->string("estudio")->nullable();
            $table->string("amistades")->nullable();
            $table->string("amistades_municipio")->nullable();
            $table->string("correo_electronico")->nullable();
            $table->string("nombre_redes_sociales")->nullable();
            $table->string("lugares_frecuentes")->nullable();
            $table->string("vivienda_estado")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contexto_socials');
    }
};
