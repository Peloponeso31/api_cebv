<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('desapariciones', function (Blueprint $table) {
            $table->id();
            $table->integer('persona_id');
            $table->integer('dependencia_id');
            $table->integer('ubicacion_id');
            $table->dateTime('fecha_desaparicion')->nullable();
            $table->dateTime('fecha_percato')->nullable();
            $table->string('zona_estado');
            $table->integer('area_id');
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
