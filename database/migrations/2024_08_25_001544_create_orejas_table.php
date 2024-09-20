<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orejas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('tamano_orejas_id')->nullable()->constrained(table: 'cat_tamanos_orejas');
            $table->foreignId('forma_orejas_id')->nullable()->constrained(table: 'cat_formas_orejas');

            $table->text('especificaciones_orejas')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orejas');
    }
};
