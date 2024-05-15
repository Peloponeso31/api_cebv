<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reportantes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id');
            $table->foreignId('persona_id')->nullable();
            $table->foreignId('parentesco_id')->nullable();

            $table->boolean('denuncia_anonima')->nullable();
            $table->boolean('informacion_consentimiento')->nullable();
            $table->boolean('informacion_exclusiva_busqueda')->nullable();
            $table->boolean('publicacion_registro_nacional')->nullable();
            $table->boolean('publicacion_boletin')->nullable();
            $table->boolean('pertenencia_colectivo')->nullable();
            $table->string('nombre_colectivo')->nullable();
            $table->text('informacion_relevante')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reportantes');
    }
};
