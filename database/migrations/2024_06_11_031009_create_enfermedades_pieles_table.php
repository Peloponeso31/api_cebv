<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('enfermedades_piel', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained('personas');
            $table->foreignId('tipo_enfermedad_piel_id')->constrained('cat_tipos_enfermedades_piel');

            $table->text('descripcion')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enfermedades_piel');
    }
};
