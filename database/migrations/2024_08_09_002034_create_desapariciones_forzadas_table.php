<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('desapariciones_forzadas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('autoridad_id')->nullable()->constrained(table: 'cat_autoridades');
            $table->foreignId('particular_id')->nullable()->constrained(table: 'cat_particulares');
            $table->foreignId('metodo_captura_id')->nullable()->constrained(table: 'cat_metodos_captura');
            $table->foreignId('medio_captura_id')->nullable()->constrained(table: 'cat_medios_captura');

            $table->boolean('desaparecio_autoridad')->nullable();
            $table->text('descripcion_autoridad')->nullable();
            $table->text('descripcion_particular')->nullable();
            $table->boolean('desaparecio_particular')->nullable();
            $table->text('descripcion_metodo_captura')->nullable();
            $table->text('descripcion_medio_captura')->nullable();
            $table->boolean('detencion_previa_extorsion')->nullable();
            $table->text('descripcion_detencion_previa_extorsion')->nullable();
            $table->boolean('ha_sido_avistado')->nullable();
            $table->text('donde_ha_sido_avistado')->nullable();
            $table->boolean('delitos_desaparicion')->nullable();
            $table->text('descripcion_delitos_desaparicion')->nullable();
            $table->text('descripcion_grupo_perpetrador')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desapariciones_forzadas');
    }
};
