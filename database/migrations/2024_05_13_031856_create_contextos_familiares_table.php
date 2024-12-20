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
        Schema::create('contextos_familiares', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id') -> constrained(table: 'personas');
            $table->foreignId('estado_conyugal_id')->nullable()->constrained(table: 'cat_estados_conyugales');

            $table->integer('numero_personas_vive')->nullable();
            $table->string('nombre_pareja_conyugue')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contextos_familiares');
    }
};
