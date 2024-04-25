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

            $table->string('lugar_nacimiento_id', 2)->nullable();

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
            $table->string('ocupacion')->nullable();
            $table->enum('sexo', ['H', 'M'])->nullable();
            $table->string('genero', 50)->nullable();

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
