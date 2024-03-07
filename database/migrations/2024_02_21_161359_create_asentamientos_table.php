<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('asentamientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('municipio_id')
                ->constrained(table: 'municipios', indexName: 'idx_asentamientos_municipio');
            $table->integer('codigo_postal');
            $table->string('nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asentamientos');
    }
};
