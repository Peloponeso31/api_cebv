<?php

use App\Enums\OpcionesCebv;
use App\Enums\ResultadoRnd;
use App\Helpers\EnumHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hechos_desapariciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('direccion_id')->nullable()->constrained(table: 'direcciones');
            $table->foreignId('sitio_id')->nullable()->constrained(table: 'cat_sitios');
            $table->foreignId('area_asigna_sitio_id')->nullable()->constrained(table: 'cat_areas');

            $table->boolean('fecha_desaparicion_desconocida')->default(false);
            $table->dateTime('fecha_desaparicion')->nullable();
            $table->string('fecha_desaparicion_cebv')->nullable();
            $table->string('hora_desaparicion')->nullable();
            $table->dateTime('fecha_percato')->nullable();
            $table->string('fecha_percato_cebv')->nullable();
            $table->string('hora_percato')->nullable();;
            $table->text('aclaraciones_fecha_hechos')->nullable();

            $table->boolean('amenaza_cambio_comportamiento')->nullable();
            $table->text('descripcion_amenaza_cambio_comportamiento')->nullable();
            $table->integer('contador_desapariciones')->nullable();
            $table->text('situacion_previa')->nullable();
            $table->text('informacion_relevante')->nullable();
            $table->text('hechos_desaparicion')->nullable();
            $table->text('sintesis_desaparicion')->nullable();
            $table->boolean('desaparecio_acompanado')->nullable();
            $table->integer('personas_mismo_evento')->nullable()->default(1);

            $table->string('contexto_desaparicion')->nullable();
            $table->enum('resultado_rnd', EnumHelper::toList(OpcionesCebv::class))
                ->default(OpcionesCebv::NoEspecifica->value)
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desapariciones');
    }
};
