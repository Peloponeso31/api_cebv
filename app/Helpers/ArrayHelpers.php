<?php

namespace App\Helpers;

use Generator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
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

    public static function asyncHandler(Model $model, array $request, array $patterns): void
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

        try {
            // TODO: Implementar la lógica de validación
            // Crear o actualizar el modelo
            $model::updateOrCreate(['id' => $request['id'] ?? null], $data);

        } catch (\Exception $e) {
            Log::error("Error al procesar el modelo: " . $e->getMessage());
        }
    }
}
