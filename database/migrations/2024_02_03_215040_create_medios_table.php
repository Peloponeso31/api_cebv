<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('medios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tipo_medio_id')->constrained(table: 'tipos_medios',indexName: 'idx_medios_tipo_medio');

            $table->string('nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medios');
    }
};
