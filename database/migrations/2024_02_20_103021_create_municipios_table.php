<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->string('id', 5)->primary();
            $table->string('estado_id', 2);
            $table->string('nombre', 100);
            $table->foreignId('area_atiende_id')->nullable();

            $table->foreign('estado_id')
                ->references('id')->on('estados');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('municipios');
    }
};
