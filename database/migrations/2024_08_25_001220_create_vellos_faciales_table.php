<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vellos_faciales', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('cejas_id')->nullable()->constrained(table: 'cat_cejas');

            $table->text('especificaciones_cejas')->nullable();
            $table->boolean('tiene_bigote')->nullable();
            $table->text('especificaciones_bigote')->nullable();
            $table->boolean('tiene_barba')->nullable();
            $table->text('especificaciones_barba')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vellos_faciales');
    }
};
