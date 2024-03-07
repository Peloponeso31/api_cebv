<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asentamiento_id')
                ->constrained(table: 'asentamientos', indexName: 'idx_direcciones_asentamiento');
            $table->string('calle');
            $table->string('numero_exterior');
            $table->string('numero_interior')->nullable();
            $table->string('calle_1')->nullable();
            $table->string('calle_2')->nullable();
            $table->string('descripcion')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};
