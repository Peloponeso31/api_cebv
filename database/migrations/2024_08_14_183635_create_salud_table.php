<?php

use App\Enums\OpcionesCebv;
use App\Helpers\EnumHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('salud', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('tipo_sangre_id')->nullable()->constrained(table: 'cat_tipos_sangre');

            // Perfil Corporal
            $table->foreignId('complexion_id')->nullable()->constrained(table: 'cat_complexiones');
            $table->foreignId('color_piel_id')->nullable()->constrained(table: 'cat_colores_piel');
            $table->foreignId('forma_cara_id')->nullable()->constrained(table: 'cat_formas_caras');
            $table->integer('estatura_centimetros')->nullable();
            $table->float('peso_kilogramos')->nullable();
            $table->enum('factor_rhesus', EnumHelper::toList(OpcionesCebv::class))->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salud');
    }
};
