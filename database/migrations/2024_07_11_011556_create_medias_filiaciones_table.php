<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medias_filiaciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->nullable()->constrained(table: 'personas');
            // Perfil Corporal
            $table->foreignId('complexion_id')->nullable()->constrained(table: 'cat_complexiones');
            $table->foreignId('color_piel_id')->nullable()->constrained(table: 'cat_colores_piel');
            $table->foreignId('forma_cara_id')->nullable()->constrained(table: 'cat_formas_caras');
            $table->integer('estatura_centimetros')->nullable();
            $table->float('peso_kilogramos')->nullable();
            // Ojos
            $table->foreignId('color_ojos_id')->nullable()->constrained(table: 'cat_colores_ojos');
            $table->foreignId('forma_ojos_id')->nullable()->constrained(table: 'cat_formas_ojos');
            $table->foreignId('tamano_ojos_id')->nullable()->constrained(table: 'cat_tamanos_ojos');
            $table->text('especificaciones_ojos')->nullable();
            // Cabello
            $table->foreignId('calvicie_id')->nullable()->constrained(table: 'cat_calvicies');
            $table->foreignId('color_cabello_id')->nullable()->constrained(table: 'cat_colores_cabello');
            $table->foreignId('tamano_cabello_id')->nullable()->constrained(table: 'cat_tamanos_cabello');
            $table->foreignId('tipo_cabello_id')->nullable()->constrained(table: 'cat_tipos_cabello');
            $table->text('especificaciones_cabello')->nullable();
            // Vello facial
            $table->foreignId('cejas_id')->nullable()->constrained(table: 'cat_cejas');
            $table->text('especificaciones_cejas')->nullable();
            $table->boolean('tiene_bigote')->nullable();
            $table->text('especificaciones_bigote')->nullable();
            $table->boolean('tiene_barba')->nullable();
            $table->text('especificaciones_barba')->nullable();
            // Nariz
            $table->foreignId('tipo_nariz_id')->nullable()->constrained(table: 'cat_tipos_narices');
            $table->text('especificaciones_nariz')->nullable();
            // Boca
            $table->foreignId('tamano_boca_id')->nullable()->constrained(table: 'cat_tamanos_boca');
            $table->foreignId('tamano_labios_id')->nullable()->constrained(table: 'cat_tamanos_labios');
            $table->text('especificaciones_boca')->nullable();
            // Orejas
            $table->foreignId('tamano_orejas_id')->nullable()->constrained(table: 'cat_tamanos_orejas');
            $table->foreignId('forma_orejas_id')->nullable()->constrained(table: 'cat_formas_orejas');
            $table->text('especificaciones_orejas')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias_filiaciones');
    }
};
