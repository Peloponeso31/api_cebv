<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('localizaciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('desaparecido_id')->constrained(table: 'desaparecidos');
            $table->foreignId('sitio_id')->nullable()->constrained(table: 'cat_sitios');
            $table->foreignId('area_id')->nullable()->constrained(table: 'cat_areas');
            $table->string('municipio_localizacion_id', 5)->nullable();
            $table->foreignId('hipotesis_deb_id')->nullable()->constrained(table: 'cat_tipos_hipotesis_inmediatas');

            $table->dateTime('fecha_localizacion')->nullable();
            $table->dateTime('fecha_hallazgo')->nullable();
            $table->dateTime('fecha_identificacion_familiar')->nullable();
            $table->text('sintesis_localizacion')->nullable();
            $table->text('descripcion_condicion_persona')->nullable();
            $table->text('descripcion_causas_fallecimiento')->nullable();

            $table->foreign('municipio_localizacion_id')->references('id')->on('cat_municipios');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('localizaciones');
    }
};
