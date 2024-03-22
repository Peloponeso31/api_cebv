<?php

use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('folios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')->constrained(table: 'personas');
            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('user_id')->constrained(table: 'users');

            $table->string('folio');
            // TODO: Add dateTime to created at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('folios');
    }
};
