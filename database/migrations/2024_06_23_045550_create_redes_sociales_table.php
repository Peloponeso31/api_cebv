<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('redes_sociales', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('tipo_red_social_id')->constrained(table: 'cat_tipos_redes_sociales');

            $table->string('usuario');
            $table->string('observaciones')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('redes_sociales');
    }
};
