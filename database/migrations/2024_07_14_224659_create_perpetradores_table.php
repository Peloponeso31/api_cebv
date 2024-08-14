<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('perpetradores', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('sexo_id')->nullable()->constrained(table: 'cat_sexos');
            $table->foreignId('estatus_perpetrador_id')->nullable()->constrained(table: 'estatus_perpetradores');

            $table->string('nombre');
            $table->string('descripcion')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perpetradores');
    }
};
