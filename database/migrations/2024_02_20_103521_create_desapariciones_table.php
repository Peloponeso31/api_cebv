<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('desapariciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')
                ->constrained(table: 'personas', indexName: 'idx_desapariciones_persona');
            $table->foreignId('dependencia_id')
                ->constrained(table: 'dependencias', indexName: 'idx_desapariciones_dependencia');
            $table->foreignId('ubicacion_id')
                ->constrained(table: 'municipios', indexName: 'idx_desapariciones_ubicacion');
            $table->dateTime('fecha_desaparicion')->nullable();
            $table->dateTime('fecha_percato')->nullable();
            $table->string('zona_estado');  // Centro, Norte, Sur
            $table->foreignId('area_id')
                ->constrained(table: 'areas', indexName: 'idx_desapariciones_area');
            $table->boolean('fue_amenazado');
            $table->text('descripcion_amenaza')->nullable();
            $table->integer('contador_desaparicion');
            $table->text('hechos_desaparicion')->nullable();
            $table->text('sintesis_desaparicion')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desapariciones');
    }
};
