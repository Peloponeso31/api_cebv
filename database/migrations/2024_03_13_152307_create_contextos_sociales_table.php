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
        Schema::create('contextos_sociales', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('situacion_migratoria_id')->constrained(table: 'cat_situaciones_migratorias');

            $table->boolean('esta_transito_estados_unidos')->nullable();
            $table->text('descripcion_proceso_migratorio')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contextos_sociales');
    }
};
