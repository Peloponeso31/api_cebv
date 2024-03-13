<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hipotesis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporte_id')
                ->constrained(table: 'reportes', indexName: 'idx_hipotesis_reporte');

            $table->foreignId('area_id')
                ->nullable()
                ->constrained(table: 'areas', indexName: 'idx_hipotesis_area');

            $table->date('fecha_localizacion')->nullable();
            $table->text('sintesis_localizacion')->nullable();

            $table->foreignId('circunstancia_uno_id')
                ->nullable()
                ->constrained(table: 'circunstancias', indexName: 'idx_hipotesis_circunstancia_uno');
            $table->text('hipotesis_uno')->nullable();

            $table->foreignId('circunstancia_dos_id')
                ->nullable()
                ->constrained(table: 'circunstancias', indexName: 'idx_hipotesis_circunstancia_dos');
            $table->text('hipotesis_dos')->nullable();


            $table->string('sitio_final')->nullable();
            $table->foreignId('tipo_hipotesis_id')
                ->nullable()
                ->constrained(table: 'tipos_hipotesis', indexName: 'idx_hipotesis_tipo_hipotesis');
            $table->text('observaciones')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hipotesis');
    }
};
