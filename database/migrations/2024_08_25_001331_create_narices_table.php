<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('narices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('tipo_nariz_id')->nullable()->constrained(table: 'cat_tipos_narices');

            $table->text('especificaciones_nariz')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('narices');
    }
};
