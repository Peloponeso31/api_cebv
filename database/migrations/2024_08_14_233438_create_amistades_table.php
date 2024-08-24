<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('amistades', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('tipo_red_social_id')->constrained(table: 'cat_tipos_redes_sociales');

            $table->string('nombre');
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('apodo')->nullable();
            $table->string('telefono', 10)->nullable();
            $table->string('usuario_red_social')->nullable();
            $table->string('observaciones_red_social')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('amistades');
    }
};
