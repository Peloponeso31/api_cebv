<?php

use App\Models\Genero;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sexo_id')->nullable()->constrained(table: 'cat_sexos');
            $table->foreignId('genero_id')->nullable()->constrained(table: 'cat_generos');
            $table->foreignId('religion_id')->nullable()->constrained(table: 'cat_religiones');
            $table->foreignId('lengua_id')->nullable()->constrained(table: 'cat_lenguas');
            $table->foreignId('razon_curp_id')->nullable()->constrained(table: 'cat_razones_curp');
            $table->string('lugar_nacimiento_id', 2)->nullable();

            $table->string('nombre')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('apodo')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('curp', 18)->unique()->nullable();
            $table->text('observaciones_curp')->nullable();
            $table->string('rfc', 13)->unique()->nullable();
            $table->boolean('habla_espanhol')->nullable();
            $table->text('especificaciones_ocupacion')->nullable();


            $table->foreign('lugar_nacimiento_id')
                ->references('id')->on('cat_estados');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
