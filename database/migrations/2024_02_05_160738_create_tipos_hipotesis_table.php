<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tipos_hipotesis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('circunstancia_id')
                ->constrained(table: 'circunstancias', indexName: 'idx_tipos_hipotesis_circunstancia');
            $table->string('abreviatura', 10);
            $table->string('descripcion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipos_hipoteses');
    }
};
