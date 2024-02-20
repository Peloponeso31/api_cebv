<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estado_id')
                ->constrained(table: 'estados', indexName: 'idx_municipios_estado');
            $table->string('nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('municipios');
    }
};
