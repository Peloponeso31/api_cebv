<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();

            $table->string('asentamiento_id', 9)->nullable();

            $table->string('domicilio_concatenado', 9)->nullable();
            $table->string('calle')->nullable();
            $table->string('colonia')->nullable();
            $table->string('numero_exterior', 10)->nullable();
            $table->string('numero_interior', 10)->nullable();
            $table->string('calle_1')->nullable();
            $table->string('calle_2')->nullable();
            $table->string('tramo_carretero', 100)->nullable();
            $table->string('codigo_postal', 5)->nullable();
            $table->text('referencia')->nullable();

            $table->foreign('asentamiento_id')
                ->references('id')->on('cat_asentamientos');

            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_actualizacion')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};
