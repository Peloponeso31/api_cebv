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
            $table->foreignId('ocupacion_principal_id')->nullable();
            $table->foreignId('ocupacion_secundaria_id')->nullable();

            $table->string('clasificacion_persona')->nullable();
            $table->boolean('habla_espanhol')->nullable();
            $table->boolean('sabe_leer')->nullable();
            $table->boolean('sabe_escribir')->nullable();
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

            $table->text('identidad_resguardada')->nullable();
            $table->text('alias')->nullable();
            $table->text('descripcion_ocupacion_principal')->nullable();
            $table->text('descripcion_ocupacion_secundaria')->nullable();
            $table->text('otras_especificaciones_ocupacion')->nullable();
            $table->text('nombre_pareja_conyugue')->nullable();
            $table->text("boletin_img_path")->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desaparecidos');
    }
};
