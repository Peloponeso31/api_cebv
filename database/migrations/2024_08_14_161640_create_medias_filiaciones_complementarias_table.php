<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('medias_filiaciones_complementarias', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->nullable()->constrained(table: 'personas');
            $table->foreignId('tipo_menton_id')->nullable()->constrained(table: 'cat_tipos_menton');

            $table->boolean('tiene_ausencia_dental')->nullable();
            $table->text('descripcion_ausencia_dental')->nullable();
            $table->boolean('tiene_tratamiento_dental')->nullable();
            $table->text('descripcion_tratamiento_dental')->nullable();
            $table->text('especificaciones_menton')->nullable();
            $table->text('observaciones_generales')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medias_filiaciones_complementarias');
    }
};
