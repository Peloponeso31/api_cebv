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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string  ('nombre')->nullable();
            $table->string  ('apellido_paterno')->nullable();
            $table->string  ('apellido_materno')->nullable();
            $table->date    ('fecha_nacimiento')->nullable();
            $table->string  ('curp')->nullable()->unique();
            $table->string  ('ocupacion')->nullable();
            $table->string  ('sexo_al_nacer')->nullable();
            $table->string  ('genero')->nullable();
            $table->timestamps();
            //$table->boolean ('violencia_familiar');
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
