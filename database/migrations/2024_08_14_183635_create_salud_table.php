<?php

use App\Enums\FactorRhesus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('salud', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('tipo_sangre_id')->constrained(table: 'cat_tipos_sangre');

            $table->enum('factor_rhesus', FactorRhesus::toList())->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salud');
    }
};
