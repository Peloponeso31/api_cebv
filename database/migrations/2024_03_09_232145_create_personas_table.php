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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sexo_id')->nullable()->constrained(table: 'sexos');
            $table->foreignId('genero_id')->nullable()->constrained(table: 'generos');
            $table->string('lugar_nacimiento_id', 2)->nullable();
            $table->foreignId('religion_id')->nullable()->constrained(table: 'religiones');
            $table->foreignId('lengua_id')->nullable()->constrained(table: 'lenguas');
            $table->foreignId('estado_conyugal_id')->nullable()->constrained(table: 'estados_conyugales');
            $table->foreignId('escolaridad_id')->nullable()->constrained(table: 'escolaridades');

            $table->string('nombre')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('pseudonimo_nombre')->nullable();
            $table->string('pseudonimo_apellido_paterno')->nullable();
            $table->string('pseudonimo_apellido_materno')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('curp', 18)->unique()->nullable();
            $table->text('observaciones_curp')->nullable();
            $table->string('rfc', 13)->unique()->nullable();
            $table->enum('nivel_escolaridad', ['TERMINADA', 'EN CURSO', 'NO ESPECIFICA'])->nullable();

            $table->foreign('lugar_nacimiento_id')
                ->references('id')->on('estados');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
