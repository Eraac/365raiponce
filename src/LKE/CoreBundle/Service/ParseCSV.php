<?php

namespace LKE\CoreBundle\Service;

class ParseCSV
{
    public function parse($file, $separator = ",")
    {
        $ignoreFirstLine = true;
        $i = 0;

        $csv = $this->getFile($file);

        $rows = array();

        while (($data = fgetcsv($csv, null, $separator)) !== FALSE)
        {
            $i++;
            if ($ignoreFirstLine && $i == 1) { continue; }
            $rows[] = $data;
        }

        fclose($csv);

        return $rows;
    }

    private function getFile($file)
    {
        $csvString = file_get_contents($file);

        $tmp = tmpfile();
        fwrite($tmp, $csvString);
        fseek($tmp, 0);

        return $tmp;
    }
}
