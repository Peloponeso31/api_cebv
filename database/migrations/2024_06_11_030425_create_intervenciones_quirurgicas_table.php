<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('intervenciones_quirurgicas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('tipo_intervencion_quirurgica_id')->constrained(
                table: 'cat_tipos_intervencion_quirurgica',
                indexName: 'fk_interv_quirurgica_tipo_intervencion_quirurgica_id');

            $table->text('descripcion')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('intervenciones_quirurgicas');
    }
};
