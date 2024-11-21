<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('persona_tipo_enfoque_diferenciado', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tipo_enfoque_diferenciado_id')
                ->constrained(table: 'cat_tipo_enfoque_diferenciados', indexName: 'tipo_enfoque_id_foreign');
            $table->foreignId('persona_id')->constrained(table: 'personas');

            $table->comment('Tabla pivote para los tipos de enfoques diferenciados de personas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persona_tipo_enfoque_diferenciado');
    }
};
