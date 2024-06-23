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
            $table->foreignIdFor(RelacionVehiculo::class, 'relacion_vehiculo_id');
            $table->foreignIdFor(TipoVehiculo::class, 'tipo_vehiculo_id');
            $table->foreignIdFor(UsoVehiculo::class, 'uso_vehiculo_id');
            $table->foreignIdFor(MarcaVehiculo::class, 'marca_vehiculo_id')->nullable();
            $table->foreignIdFor(Color::class, 'color_id');
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
