<?php

use App\Enums\TipoExpediente;
use App\Helpers\EnumHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    static string $tableName = 'expedientes';
    static string $constraintName = 'check_reporte_uno_mismo_reporte_dos';

    public function up(): void
    {
        Schema::create(self::$tableName, function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_uno_id')->constrained(table: 'reportes');
            $table->foreignId('reporte_dos_id')->constrained(table: 'reportes');
            $table->foreignId('parentesco_id')->constrained(table: 'cat_parentescos');

            $table->enum('tipo', EnumHelper::toList(TipoExpediente::class));

            // Validaciones para evitar errores de vinculación
            $table->unique(['reporte_uno_id', 'reporte_dos_id']);
        });

        $tableName = self::$tableName;
        $constraintName = self::$constraintName;

        // Validación para evitar que un expediente se vincule consigo mismo
        // Es una ******** que Eloquent no acepte check
        DB::statement("ALTER TABLE $tableName ADD CONSTRAINT $constraintName CHECK (reporte_uno_id != reporte_dos_id)");
    }

    public function down(): void
    {
        $tableName = self::$tableName;
        $constraintName = self::$constraintName;

        DB::statement("ALTER TABLE $tableName DROP CONSTRAINT IF EXISTS $constraintName");

        Schema::dropIfExists(self::$tableName);
    }
};
