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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nombre")->nullable();
            $table->string("apellido_paterno")->nullable();
            $table->string("apellido_materno")->nullable();
            $table->string("fecha_nacimiento")->nullable();
            $table->foreignId("puesto_id")->nullable();
            $table->foreignId("oficina_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
