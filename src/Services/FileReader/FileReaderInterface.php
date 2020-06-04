<?php
declare(strict_types=1);

namespace App\Services\FileReader;

/**
 *  Contract to read file
 */
interface FileReaderInterface
{   
    /**
     * read Open file to read
     * @param  string $filePath String with absolute path to file
     * @throws Exception Throw Exception when file is not readable
     * @return void
     */
    public function read(string $filePath): void;

    /**
     * parseToArray Parse data from file to array
     * @return Array Return array with data from file
     */
    public function parseToArray(): Array;

}
