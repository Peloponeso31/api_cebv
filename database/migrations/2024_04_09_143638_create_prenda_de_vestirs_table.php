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
        Schema::create('prenda-vestir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupo_pertenencia_id');
            $table->foreignId('pertenencia_id');
            $table->foreignId('color_id');
            $table->string("marca");
            $table->string("descripcion");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prenda-vestir');
    }
};
