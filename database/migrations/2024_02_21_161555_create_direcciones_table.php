<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->string('asentamiento_id', 9);

            $table->string('calle');
            $table->string('numero_exterior');
            $table->string('numero_interior')->nullable();
            $table->string('calle_1')->nullable();
            $table->string('calle_2')->nullable();
            $table->double('tramo_carretero')->nullable();
            $table->integer('codigo_postal');
            $table->string('referencia')->nullable();

            $table->foreign('asentamiento_id')
                ->references('id')->on('asentamientos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};
