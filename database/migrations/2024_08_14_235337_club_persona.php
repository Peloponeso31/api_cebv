<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('club_persona', function (Blueprint $table) {
            $table->id();

            $table->foreignId('club_id')->constrained(table: 'cat_clubes');
            $table->foreignId('persona_id')->constrained(table: 'personas');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('club_persona');
    }
};
