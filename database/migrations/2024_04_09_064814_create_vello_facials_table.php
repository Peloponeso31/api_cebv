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
        Schema::create('vello_facials', function (Blueprint $table) {
            $table->id();
            $table->foreignId("persona_id");
            $table->foreignId("regionVellofacial_id");
            $table->foreignId("colorVellofacial_id");
            $table->foreignId("volumenVellofacial_id");
            $table->foreignId("corteVellofacial_id");
            $table->string ("modificacionVellofacial");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vello_facials');
    }
};
