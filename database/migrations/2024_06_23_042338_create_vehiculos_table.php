<?php

use App\Models\Color;
use App\Models\MarcaVehiculo;
use App\Models\RelacionVehiculo;
use App\Models\TipoVehiculo;
use App\Models\UsoVehiculo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('relacion_vehiculo_id')->constrained(table: 'relaciones_vehiculos');
            $table->foreignId('tipo_vehiculo_id')->constrained(table: 'tipos_vehiculos');
            $table->foreignId('uso_vehiculo_id')->constrained(table: 'usos_vehiculos');
            $table->foreignId('marca_vehiculo_id')->nullable()->constrained(table: 'marcas_vehiculos');
            $table->foreignId('color_id')->constrained(table: 'colores');

            $table->string('submarca')->nullable();
            $table->string('placa')->nullable();
            $table->string('modelo')->nullable();
            $table->string('numero_serie')->nullable();
            $table->string('numero_motor')->nullable();
            $table->string('numero_permiso')->nullable();
            $table->string('descripcion')->nullable();
            $table->boolean('localizado');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};