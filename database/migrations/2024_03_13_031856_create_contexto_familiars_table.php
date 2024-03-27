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
        Schema::create('contexto_familiars', function (Blueprint $table) {
            $table->id();
            $table->foreignId("persona_id")->nullable();
            $table->string("personas_vive")->nullable();
            $table->integer("hijos")->nullable();
            $table->string("familiar_cercano")->nullable();
            $table->string("familiar_violencia")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contexto_familiars');
    }
};
