<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('desapariciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(
                table: 'personas', indexName: 'idx_desapariciones_persona'
            );
            $table->foreignId('direccion_id')->constrained(
                table: 'direcciones', indexName: 'idx_desapariciones_direccion'
            );
            $table->string('zona_estado')->nullable();  // Centro, Norte, Sur
            $table->foreignId('area_id')
                ->constrained(table: 'areas', indexName: 'idx_desapariciones_area');
            $table->string('dependencia');

            $table->dateTime('fecha_desaparicion')->nullable();
            $table->dateTime('fecha_percato')->nullable();
            $table->boolean('cambio_comportamiento');
            $table->boolean('fue_amenazado');
            $table->text('descripcion_amenaza')->nullable();
            $table->integer('contador_desapariciones');
            $table->text('situacion_previa')->nullable();
            $table->text('informacion_relevante')->nullable();
            $table->text('hechos_desaparicion')->nullable();
            $table->text('sintesis_desaparicion')->nullable();
            $table->foreignId('hipotesis_id')->constrained(
                table: 'hipotesis', indexName: 'idx_desapariciones_hipotesis'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desapariciones');
    }
};
