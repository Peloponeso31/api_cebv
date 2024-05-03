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
        Schema::create('proyeccion_mentons', function (Blueprint $table) {
            $table->id();
            $table->foreignId("persona_id");
            $table->foreignId("tipoProyeccionMenton_id");
            $table->string ("modificacionProyeccionMenton");
            $table->string ("cirugiasProyeccionMenton");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeccion_mentons');
    }
};
