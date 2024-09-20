<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cat_estados', function (Blueprint $table) {
            $table->string('id', 2)->primary();
            $table->string('nombre', 100);
            $table->string('abreviatura_inegi', 10);
            $table->string('abreviatura_cebv', 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cat_estados');
    }
};
