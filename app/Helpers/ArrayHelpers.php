<?php

namespace App\Helpers;

use DB;
use Generator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\AssignOp\Mod;
use Psy\Readline\Hoa\Console;

class ArrayHelpers
{
    /**
     * Chunk an array into smaller arrays for optimization
     *
     * @param string $path
     * @param callable $generator
     * @param int $chunkSize
     * @return Generator
     */
    public static function chunkFile(string $path, callable $generator, int $chunkSize = 1000): Generator
    {
        /*
         * Get the path of the CSV file
         */
        $file = fopen($path, 'r');
        $data = [];

        /*
         * Open the CSV and skip the header of the CSV file
         */
        fgetcsv($file);

        for ($i = 1; ($row = fgetcsv($file)) !== false; $i++) {
            $data[] = $generator($row);

            /**
             * If the data array has reached the chunk size, yield the data array
             */
            if ($i % $chunkSize === 0) {
                yield $data;
                $data = [];
            }
        }

        /**
         * If the data array is not empty, yield the data array
         */
        if (!empty($data)) {
            yield $data;
        }

        /*
         * Close the CSV file
         */
        fclose($file);
    }

    /**
     * Procesa la información de un modelo para su almacenamiento en la base de datos
     *
     * @param string $model
     * @param array $request
     * @param array $patterns
     * @return Model
     */
    public static function asyncHandler(string $model, array $request, array $patterns = []): Model
    {
        // Crear una instancia del modelo
        $instance = new $model;

        // Obtener las columnas que se pueden llenar
        $columns = $instance->getFillable();

        // Crear un arreglo para almacenar los datos
        $data = [];

        // Iterar sobre cada campo fillable del modelo
        foreach ($columns as $column) {
            // Verificar si existe un patrón para el campo actual
            if (isset($patterns[$column])) {
                // Usar el patrón para acceder al valor
                $data[$column] = data_get($request, $patterns[$column]);
            } elseif (array_key_exists($column, $request)) {
                // Si no hay patrón, se toma el valor directamente
                $data[$column] = $request[$column];
            }
        }

        // Crear o actualizar el registro en la base de datos
        return $instance->newQuery()
            ->updateOrCreate(
                ['id' => $request['id'] ?? null],
                $data
            );
    }

    /**
     * Obtener los ID existentes de un modelo
     * @param string $model
     * @param string $foreignKey
     * @param mixed $foreignValue
     * @return array|null
     */
    public static function getExistingId(string $model, string $foreignKey, mixed $foreignValue): ?array
    {
        // Crear una instancia del modelo
        $instance = new $model;

        // Obtener el nombre de la tabla
        $table = $instance->getTable();

        if (!Schema::hasColumn($table, $foreignKey)) return null;

        // Obtener los ID de los registros existentes
        return $instance->newQuery()
            ->where($foreignKey, $foreignValue)
            ->pluck('id')
            ->toArray();
    }

    public static function getExistingIdOnPivotTable(string $tableName, string $foreignKey, mixed $foreignValue): ?array
    {
        if (!Schema::hasColumn($tableName, $foreignKey)) return null;

        // Obtener los ID de los registros existentes
        return DB::table($tableName)
            ->where($foreignKey, $foreignValue)
            ->pluck('id')
            ->toArray();
    }


    public static function syncList(string $model, array $request, string $foreignKey = null, mixed $foreignValue = null, array $patterns = [], bool $useForeignKey = true): void
    {
        // Crear una instancia del modelo
        $instance = new $model;

        $idExistentes = [];
        if ($useForeignKey){
            // Obtener todos los ID de los registros existentes para el modelo
            $IdExistentes = ArrayHelpers::getExistingId($model, $foreignKey, $foreignValue);
        } else{
            $IdExistentes = $instance->all()->pluck('id')->toArray();
        }

        if ($IdExistentes === null) return;

        // Recopilar los ID de los registros recibidos en la solicitud
        $IdRecibidos = [];

        foreach ($request as $item) {
            $IdRecibidos[] = ArrayHelpers::asyncHandler($model, $item, $patterns)->getAttribute('id');
        }

        // Identificar los ID que deben ser eliminados
        $eliminablesIds = array_diff($IdExistentes, $IdRecibidos);

        // Eliminar los registros que ya no están en la lista recibida
        if (!empty($eliminablesIds)) {
            $instance->newQuery()
                ->whereIn('id', $eliminablesIds)
                ->delete();
        }
    }

    /**
     * Cambia el valor en un arreglo
     *
     * @param array $data
     * @param string $key
     * @param mixed $value
     * @return array
     */
    public static function setArrayValue(array $data, string $key, mixed $value): array
    {
        if (array_key_exists($key, $data)) {
            $data[$key] = $value;
        }

        return $data;
    }

    public static function setArrayRecursive(array $data, string $key, mixed $value): array
    {
        foreach ($data as $k => &$v) {
            // Si encuentra la clave en el nivel actual, actualiza el valor.
            if ($k === $key) {
                $v = $value;
            }

            // Si el valor es un array, busca recursivamente dentro de él.
            if (is_array($v)) {
                $v = self::setArrayRecursive($v, $key, $value);
            }
        }

        return $data;
    }
}
