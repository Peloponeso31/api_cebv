<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('condicion_vulnerabilidad', function (Blueprint $table) {
            $table->foreignId('tipo_sangre_id') -> constrained(table: 'sangre');
            $table->string('condicion');
            $table->string('tratamiento');
            $table->string('naturaleza');
            $table->string('condicion_actualmente');
            $table->string('pertenencia_g_e');
            $table->string('enfoque_diferenciado');
            $table->string('caracteristicas_vulnerabilidad');
            $table->string('info_localizacion');
            $table->string('embarazo');
            $table->integer('meses_embarazo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condicion_vulnerabilidad');
    }
};
