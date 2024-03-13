<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('persona_reporte', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')
                ->constrained(table: 'personas', indexName: 'idx_reporte_persona_persona');
            $table->foreignId('reporte_id')
                ->constrained(table: 'reportes', indexName: 'idx_reporte_persona_reporte');
            $table->enum('tipo_relacion', ['Reportante', 'Desaparecido']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persona_reporte');
    }
};
