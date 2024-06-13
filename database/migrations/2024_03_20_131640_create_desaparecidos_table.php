<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('desaparecidos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id');
            $table->foreignId('persona_id');
            $table->foreignId('estatus_rpdno_id')->nullable()->constrained(table: 'estatus_personas');
            $table->foreignId('estatus_cebv_id')->nullable()->constrained(table: 'estatus_personas');


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

            // TODO; Identidad resguardada (string)
            // TODO: Edad manual al momento de la desaparicion en anios, meses y dias (int).

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desaparecidos');
    }
};
