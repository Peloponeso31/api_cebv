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
        Schema::create('pabellon_auriculars', function (Blueprint $table) {
            $table->id();
            $table->foreignId("persona_id");
            $table->foreignId("tipoPabellonAuricular_id");
            $table->foreignId("modificacionPabellonAuricular_id");
            $table->string ("cirugiasPabellonAuricular");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pabellon_auriculars');
    }
};
