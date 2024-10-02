<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('desaparecidos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('persona_id')->nullable()->constrained(table: 'personas');
            $table->foreignId('estatus_preliminar_id')->nullable()->constrained(table: 'cat_estatus_personas');
            $table->foreignId('estatus_formalizado_id')->nullable()->constrained(table: 'cat_estatus_personas');

            $table->string('clasificacion_persona')->nullable();
            $table->string('url_boletin')->nullable();
            $table->boolean('declaracion_especial_ausencia')->default(false);
            $table->boolean('accion_urgente')->default(false);
            $table->boolean('dictamen')->default(false);
            $table->boolean('ci_nivel_federal')->default(false);
            $table->string('otro_derecho_humano')->nullable();

            $table->date('fecha_nacimiento_aproximada')->nullable();
            $table->string('fecha_nacimiento_cebv')->nullable();
            $table->string('observaciones_fecha_nacimiento')->nullable();
            $table->integer('edad_momento_desaparicion_anos')->nullable();
            $table->integer('edad_momento_desaparicion_meses')->nullable();
            $table->integer('edad_momento_desaparicion_dias')->nullable();
            $table->string('identidad_resguardada')->nullable();
            $table->text('senas_particulares_boletin')->nullable();
            $table->text('informacion_adicional_boletin')->nullable();
            $table->text('boletin_img_path')->nullable();

            $table->date('fecha_estatus_preliminar')->nullable()->useCurrent();
            $table->date('fecha_estatus_formalizado')->nullable();
            $table->date('fecha_captura_estatus_formalizado')->nullable()->useCurrentOnUpdate();
            $table->text('observaciones_actualizacion_estatus')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desaparecidos');
    }
};
