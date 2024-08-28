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
            $table->foreignId('estatus_rpdno_id')->nullable()->constrained(table: 'estatus_personas');
            $table->foreignId('estatus_cebv_id')->nullable()->constrained(table: 'estatus_personas');

            $table->string('clasificacion_persona')->nullable();
            $table->boolean('habla_espanhol')->nullable();
            $table->string('url_boletin')->nullable();
            $table->boolean('declaracion_especial_ausencia')->default(false)->nullable();
            $table->boolean('accion_urgente')->default(false)->nullable();
            $table->boolean('dictamen')->default(false)->nullable();
            $table->boolean('ci_nivel_federal')->default(false)->nullable();
            $table->string('otro_derecho_humano')->nullable();

            $table->date('fecha_nacimiento_aproximada')->nullable();
            $table->string('fecha_nacimiento_cebv')->nullable();
            $table->string('observaciones_fecha_nacimiento')->nullable();
            $table->integer('edad_momento_desaparicion_anos')->nullable();
            $table->integer('edad_momento_desaparicion_meses')->nullable();
            $table->integer('edad_momento_desaparicion_dias')->nullable();
            $table->string('identidad_resguardada')->nullable();
            $table->text('alias')->nullable();
            // TODO: Eliminar estado conyugal de toda la logica de desaparecido
            $table->text("boletin_img_path")->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desaparecidos');
    }
};
