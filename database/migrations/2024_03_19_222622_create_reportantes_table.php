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

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('persona_id')->nullable()->constrained(table: 'personas');
            $table->foreignId('parentesco_id')->nullable()->constrained(table: 'parentescos');
            $table->foreignId('colectivo_id')->nullable()->constrained(table: 'colectivos');

            $table->boolean('denuncia_anonima')->nullable();
            $table->boolean('informacion_consentimiento')->nullable();
            $table->boolean('informacion_exclusiva_busqueda')->nullable();
            $table->boolean('publicacion_registro_nacional')->nullable();
            $table->boolean('publicacion_boletin')->nullable();
            $table->text('informacion_relevante')->nullable();

            // TODO: Edad en años
            // TODO: Informacion relevante
            // TODO: Si el reportante ha realizado busquedas previas, en donde y si pertenece a un colectivo y a cual
            // TODO: Datos de posible estorsion o amenaza en la pestaña de reportante

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reportantes');
    }
};
