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
        Schema::create('telefonos', function (Blueprint $table) {
            $table->string('numero');
            $table->string('observaciones') -> nullable();
            $table->foreignId('compania_id') -> constrained(table: 'companias_telefonicas');
        });
       
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefonos');
    }
};
