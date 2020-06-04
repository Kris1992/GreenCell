<?php
declare(strict_types=1);

namespace App\Services\FileReader;

class CSVFileReader implements FileReaderInterface
{

    /*Don't read more than 400 chars in one line*/
    const MAX_LINE_LENGTH = 400;

    private $file;

    private $header;

    public function __destruct()
    {
        if ($this->file) {
            fclose($this->file);
        }
    }

    public function read(string $filePath): void
    {
        $this->file = fopen($filePath, "r");
        if (!$this->file) {
            throw new \Exception("Cannot read this file.");
        }
        $this->header = ['email', 'note', 'created'];
    }

    public function parseToArray(): Array
    {   

        $dataArray = Array();
        while (($rowData = fgetcsv($this->file, self::MAX_LINE_LENGTH, ",")) !== FALSE) {
            foreach ($this->header as $i => $property) {
                    $rowDataAssoc[$property] = ucfirst($rowData[$i]);
                }
            $dataArray[] = $rowDataAssoc;
        }
        
        return $dataArray;     
    }

}
