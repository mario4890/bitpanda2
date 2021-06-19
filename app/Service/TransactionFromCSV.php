<?php

namespace App\Service;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionFromCSV
{
    public function get(): string
    {
        $csvFileName    = "transactions.csv";
        $csvFile        = public_path($csvFileName);
        $csv            = $this->readCSV($csvFile,',');
        $jsonCSV        = json_encode($csv);

        return $jsonCSV;
    }

    private function readCSV(string $filename, string $delimiter): array
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $header = null;
        $data   = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }
}
