<?php

use App\Enums\OpcionesCebv;
use App\Helpers\EnumHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('generacion_documentos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('medio_difusion_id')
                ->nullable()
                ->constrained(table: 'cat_medios_difusion', indexName: 'gd_medio_difusion_id_foreign');

            $table->enum('resultado_rnd', EnumHelper::toList(OpcionesCebv::class))
                ->nullable()
                ->default(OpcionesCebv::NoEspecifica->value);
            $table->boolean('firma_ausencia')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('generacion_documentos');
    }
};
