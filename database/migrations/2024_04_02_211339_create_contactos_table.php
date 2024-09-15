<?php

use App\Enums\TipoContacto;
use App\Helpers\EnumHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('tipo_red_social_id')->nullable()->constrained(table: 'cat_tipos_redes_sociales');
            $table->enum('tipo', EnumHelper::toList(TipoContacto::class));
            $table->string('nombre');
            $table->string('observaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
