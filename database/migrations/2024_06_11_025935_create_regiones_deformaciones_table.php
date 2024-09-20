<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('regiones_deformaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('regiones_deformaciones');
    }
};
