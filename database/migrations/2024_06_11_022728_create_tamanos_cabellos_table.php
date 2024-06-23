<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tamanos_cabellos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tamanos_cabellos');
    }
};
