<?php

use App\Enums\TipoExpediente;
use App\Helpers\EnumHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('persona_id')->nullable()->constrained(table: 'personas');
            $table->foreignId('parentesco_id')->constrained(table: 'cat_parentescos');

            $table->enum('tipo', EnumHelper::toList(TipoExpediente::class));
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
