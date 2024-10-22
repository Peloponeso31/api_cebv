<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('amistad_direccion', function (Blueprint $table) {
            $table->id();

            $table->foreignId('amistad_id')->constrained(table: 'amistades');
            $table->foreignId('direccion_id')->constrained(table: 'direcciones');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('amistad_direccion');
    }
};
