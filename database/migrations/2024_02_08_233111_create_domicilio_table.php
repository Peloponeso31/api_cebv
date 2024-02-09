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
        Schema::create('domicilio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id');
            $table->string('calle')->nullable();
            $table->string('numero_interior')->nullable();
            $table->string('numero_exterior')->nullable();
            $table->string('km_carretera')->nullable();
            $table->string('entre_calle_1')->nullable();
            $table->string('entre_calle_2')->nullable();
            $table->text('referencia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domicilio');
    }
};
