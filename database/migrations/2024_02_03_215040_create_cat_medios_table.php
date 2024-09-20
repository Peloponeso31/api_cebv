<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cat_medios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tipo_medio_id')->constrained(table: 'cat_tipos_medios');

            $table->string('nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cat_medios');
    }
};
