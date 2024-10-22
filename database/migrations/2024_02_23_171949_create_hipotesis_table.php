<?php

use App\Enums\EtapaHipotesis;
use App\Helpers\EnumHelper;
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

            $table->enum('etapa', EnumHelper::toList(EtapaHipotesis::class));
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hipotesis');
    }
};
