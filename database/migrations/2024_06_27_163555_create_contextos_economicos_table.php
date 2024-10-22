<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contextos_economicos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');

            $table->string('donde_trabaja')->nullable();
            $table->integer('antiguedad_trabajo')->nullable();
            $table->boolean('gusta_trabajo')->nullable();
            $table->boolean('desea_trabajo_foraneo')->nullable();
            $table->string('ubicacion_trabajo_foraneo')->nullable();
            $table->boolean('violencia_laboral')->nullable();
            $table->string('violentador_laboral')->nullable();
            $table->boolean('tiene_deudas')->nullable();
            $table->float('monto_deuda')->nullable();
            $table->string('deuda_con')->nullable();
            $table->text('otras_especificaciones_ocupacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contextos_economicos');
    }
};
