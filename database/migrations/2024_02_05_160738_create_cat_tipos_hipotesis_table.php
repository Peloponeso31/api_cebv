<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cat_tipos_hipotesis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('circunstancia_id')->constrained(table: 'cat_circunstancias');

            $table->string('abreviatura', 10);
            $table->string('descripcion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cat_tipos_hipoteses');
    }
};
