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
        Schema::create('contexto_economicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("persona_id")->nullable();
            $table->string("empresa")->nullable();
            $table->string("puesto")->nullable();
            $table->date("fecha_ingreso")->nullable();
            $table->string("relacion_colegas")->nullable();
            $table->string("conflictos_trabajo")->nullable();
            $table->integer("deudas")->nullable();
            $table->string("cambiosFinanzas")->nullable();
            $table->string("actividadesExtralaborales")->nullable();
            $table->string("emprendimientos")->nullable();
            $table->string("saludMental")->nullable();
            $table->string("ausenciaPrevia")->nullable();
            $table->string("contactosRelevantes")->nullable();
            $table->string("beneficios")->nullable();
            $table->string("cambiosBeneficios")->nullable();
            $table->string("ultimoContactoTrabajo")->nullable();
            $table->string("sindicato")->nullable();
            $table->date("fecha_ingreso_sindicato")->nullable();
            $table->integer ("idSindicato")->nullable();
            $table->string("posicionSindicato")->nullable();
            $table->string("participacion")->nullable();
            $table->string("relacion_sindicato")->nullable();
            $table->string("conflictos_sindicato")->nullable();
            $table->string("desacuerdos")->nullable();
            $table->string("amenazasIntimidacion")->nullable();
            $table->string("ult_cont_sindi")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contexto_economicos');
    }
};
