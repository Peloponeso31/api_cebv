<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('enfoques_diferenciados', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');

            $table->boolean('pertenencia_grupal_etnica')->nullable();
            $table->text('descripcion_vulnerabilidad')->nullable();
            $table->text('informacion_relevante_busqueda')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enfoques_diferenciados');
    }
};
