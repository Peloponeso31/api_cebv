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
        Schema::create('prendas_vestir', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pertenencia_id')->constrained(table: 'pertenencias');
            $table->foreignId('color_id')->constrained(table: 'colores');

            $table->string('marca');
            $table->string('descripcion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prendas_vestir');
    }
};
