<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('estudios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('escolaridad_id')->nullable()->constrained(table: 'cat_escolaridades');
            $table->foreignId('estatus_escolaridad_id')->nullable()->constrained(table: 'cat_estatus_escolaridades');
            $table->foreignId('direccion_id')->nullable()->constrained(table: 'direcciones');

            $table->string('nombre_institucion')->nullable();
            $table->boolean('sabe_leer_escribir')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estudios');
    }
};
