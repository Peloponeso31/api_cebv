<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('redes_sociales__personas', function (Blueprint $table) {
        
            $table->foreignId('persona_id')->constrained(table: 'personas')->nullable();
            $table->foreignId('red_social_id')->constrained(table: 'redes_sociales')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redes_sociales__personas');
    }
};
