<?php
declare(strict_types=1);

namespace App\Services\CSVFileValidator;

use Symfony\Component\HttpFoundation\File\File;

/**
 *  Contract to validate file 
 */
interface CSVFileValidatorInterface
{   
    /**
     * validate Validate CSV file 
     * @param  string $filePath Absolute path to file
     * @throws Exception Throw Exception when file doesn't exist
     * @return bool Return true if is valid otherwise false
     */
    public function validate(string $filePath): bool;

}
