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
        Schema::create('cejas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("persona_id");
            $table->foreignId("tipoCeja_id");
            $table->string ("modificacionCeja");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cejas');
    }
};
