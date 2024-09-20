<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tipos_hipotesis_inmediatas', function (Blueprint $table) {
            $table->id();
            $table->string('abreviatura');
            $table->string('nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipos_hipotesis_inmediatas');
    }
};
