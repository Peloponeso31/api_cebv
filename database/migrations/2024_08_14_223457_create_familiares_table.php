<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('familiares', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('parentesco_id')->constrained(table: 'cat_parentescos');

            $table->string('nombre');
            $table->boolean('ha_ejercido_violencia')->default(false);
            $table->boolean('es_familiar_cercano')->default(false);
            $table->text('observaciones');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('familiares');
    }
};
