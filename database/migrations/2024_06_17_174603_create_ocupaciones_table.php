<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ocupaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_ocupacion_id')->constrained('tipos_ocupacion');
            $table->string('nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ocupaciones');
    }
};
