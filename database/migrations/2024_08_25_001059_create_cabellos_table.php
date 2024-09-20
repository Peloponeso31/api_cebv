<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cabellos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('calvicie_id')->nullable()->constrained(table: 'cat_calvicies');
            $table->foreignId('color_cabello_id')->nullable()->constrained(table: 'cat_colores_cabello');
            $table->foreignId('tamano_cabello_id')->nullable()->constrained(table: 'cat_tamanos_cabello');
            $table->foreignId('tipo_cabello_id')->nullable()->constrained(table: 'cat_tipos_cabello');

            $table->text('especificaciones_cabello')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cabellos');
    }
};
