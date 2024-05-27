<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reportantes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id');
            $table->foreignId('persona_id');
            $table->foreignId('parentesco_id');

            $table->boolean('denuncia_anonima');
            $table->boolean('informacion_consentimiento');
            $table->boolean('informacion_exclusiva_busqueda');
            $table->boolean('publicacion_registro_nacional');
            $table->boolean('publicacion_boletin');
            $table->boolean('pertenencia_colectivo');
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
