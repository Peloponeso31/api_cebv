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
        Schema::create('etnias', function (Blueprint $table) {
            $table->id();
            $table->foreignId("persona_id");
            $table->foreignId("religion_id");
            $table->foreignId("lengua_id");
            $table->foreignId("grupo_etnico_id");
            $table->foreignId("vestimenta_id");
            $table->foreignId("ascendencia_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etnias');
    }
};
