<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bocas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('tamano_boca_id')->nullable()->constrained(table: 'cat_tamanos_boca');
            $table->foreignId('tamano_labios_id')->nullable()->constrained(table: 'cat_tamanos_labios');

            $table->text('especificaciones_boca')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bocas');
    }
};
