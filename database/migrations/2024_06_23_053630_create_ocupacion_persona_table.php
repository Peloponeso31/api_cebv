<?php

use App\Enums\PrioridadOcupacion;
use App\Helpers\EnumHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ocupacion_persona', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ocupacion_id')->nullable()->constrained(table: 'cat_ocupaciones');
            $table->foreignId('persona_id')->constrained(table: 'personas');

            $table->enum('prioridad', EnumHelper::toList(PrioridadOcupacion::class));
            $table->text('observaciones')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ocupacion_persona');
    }
};
