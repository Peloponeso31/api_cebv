<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cat_zonas_estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('abreviatura', 10);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cat_zonas_estados');
    }
};