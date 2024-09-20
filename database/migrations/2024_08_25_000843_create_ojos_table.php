<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ojos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');

            $table->foreignId('color_ojos_id')->nullable()->constrained(table: 'cat_colores_ojos');
            $table->foreignId('forma_ojos_id')->nullable()->constrained(table: 'cat_formas_ojos');
            $table->foreignId('tamano_ojos_id')->nullable()->constrained(table: 'cat_tamanos_ojos');

            $table->text('especificaciones_ojos')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ojos');
    }
};
