<?php

namespace App\Helpers;

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
     * @param Model $model
     * @param array $request
     * @param array $patterns
     * @return Model
     */
    public static function asyncHandler(Model $model, array $request, array $patterns = []): Model
    {
        $columns = $model->getFillable();

        $data = [];

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

        return $model->newQuery()
            ->updateOrCreate(
                ['id' => $request['id'] ?? null],
                $data
            );
    }

    /**
     * Obtener los ID existentes de un modelo
     * @param Model $model
     * @param string $foreignKey
     * @param mixed $foreignValue
     * @return array
     */
    public static function getExistingId(Model $model, string $foreignKey, mixed $foreignValue): array
    {
        $table = $model->getTable();

        if (!Schema::hasColumn($table, $foreignKey)) {
            throw new \InvalidArgumentException("La tabla $table no tiene la columna $foreignKey en la base de datos.");
        }

        return $model->newQuery() // Crea una nueva consulta para evitar usar una instancia existente
        ->where($foreignKey, $foreignValue)
            ->pluck('id')
            ->toArray();
    }


    public static function syncList(Model $model, array $request, string $foreignKey, mixed $foreignValue, array $patterns = []): void
    {
        // Obtener todos los ID de los registros existentes para el modelo
        $IdExistentes = ArrayHelpers::getExistingId($model, $foreignKey, $foreignValue);

        // Recopilar los ID de los registros recibidos en la solicitud
        $IdRecibidos = [];

        foreach ($request as $item) {
            $IdRecibidos[] = ArrayHelpers::asyncHandler($model, $item, $patterns)->getAttribute('id');
        }

        // Identificar los ID que deben ser eliminados
        $eliminablesIds = array_diff($IdExistentes, $IdRecibidos);

        // Eliminar los registros que ya no están en la lista recibida
        if (!empty($eliminablesIds)) {
            $model->newQuery()
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

            return $data;
        }

        return $data;
    }
}
