<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pseudonimos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->string('nombre')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pseudonimos');
    }
};
