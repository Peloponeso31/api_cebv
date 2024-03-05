<?php

namespace App\Helpers;

use Generator;

class ArrayHelpers
{
    /**
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
}
