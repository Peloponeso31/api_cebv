<?php

use App\Enums\IndoleSalud;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('condiciones_salud', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('tipo_condicion_salud_id')->constrained(table: 'cat_tipos_condiciones_salud');

            $table->enum('indole_salud', IndoleSalud::toList());
            $table->text('tratamiento')->nullable();
            $table->text('observaciones')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('condiciones_salud');
    }
};
