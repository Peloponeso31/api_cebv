<?php

use App\Enums\TipoDesaparicion;
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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tipo_reporte_id')->nullable()->constrained(table: 'cat_tipos_reportes');
            $table->foreignId('area_atiende_id')->nullable()->constrained(table: 'cat_areas');
            $table->foreignId('medio_conocimiento_id')->nullable()->constrained(table: 'cat_medios');
            $table->foreignId('zona_estado_id')->nullable()->constrained(table: 'cat_zonas_estados');
            $table->foreignId('hipotesis_oficial_id')->nullable()->constrained(table: 'cat_tipos_hipotesis');
            $table->foreignId('institucion_origen_id')->nullable()->constrained(table: 'cat_instituciones');
            $table->string('estado_id', 2)->nullable(); // Llave foránea

            $table->boolean('esta_terminado')->default(false);
            $table->enum('tipo_desaparicion', EnumHelper::toList(TipoDesaparicion::class))
                ->default(TipoDesaparicion::Unica->value)
                ->nullable();
            // TODO: Colocar fecha y sintesis de localización
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_actualizacion')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('estado_id')
                ->references('id')->on('cat_estados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
