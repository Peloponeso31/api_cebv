<?php

use App\Enums\EtapaHipotesis;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hipotesis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('tipo_hipotesis_id')->nullable()->constrained(table: 'cat_tipos_hipotesis');
            $table->foreignId('sitio_id')->nullable()->constrained(table: 'cat_sitios');
            $table->foreignId('area_asigna_sitio_id')->nullable()->constrained(table: 'cat_areas');

            $table->enum('etapa', EtapaHipotesis::toList());

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hipotesis');
    }
};
