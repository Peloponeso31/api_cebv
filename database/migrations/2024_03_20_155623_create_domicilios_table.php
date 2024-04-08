<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('direccion_id')->constrained('direcciones');
            $table->foreignId('persona_id')->constrained('personas');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('domicilios');
    }
};
