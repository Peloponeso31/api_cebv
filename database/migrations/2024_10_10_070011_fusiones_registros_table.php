<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fusiones_registros', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('persona_uno_id')->constrained(table: 'personas');
            $table->foreignId('persona_dos_id')->constrained(table: 'personas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fusiones_registros');
    }
};
