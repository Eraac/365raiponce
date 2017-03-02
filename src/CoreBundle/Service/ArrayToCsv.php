<?php

namespace CoreBundle\Service;

/**
 * Class ArrayToCsv
 *
 * @package CoreBundle\Service
 */
class ArrayToCsv
{
    /**
     * @param array  $rows
     * @param array  $headers
     * @param string $delimiter
     * @param string $enclosure
     * @param string $escape_char
     *
     * @return bool|resource
     */
    public function transform(array $rows, array $headers = [], string $delimiter = ",", string $enclosure = '"', string $escape_char = "\\")
    {
        $filename = $this->getTemporyFilename();

        $file = fopen($filename, 'w');

        if (!$file) {
            return false;
        }

        if (!empty($headers)) {
            fputcsv($file, $headers, $delimiter, $enclosure, $escape_char);
        }

        foreach ($rows as $row) {
            fputcsv($file, $row, $delimiter, $enclosure, $escape_char);
        }

        fclose($file);

        return $filename;
    }

    /**
     * @return string
     */
    private function getTemporyFilename() : string
    {
        $filename = tempnam('.', '');

        // remove the file after script is ending
        register_shutdown_function(function() use($filename) {
            unlink($filename);
        });

        return $filename;
    }
}
