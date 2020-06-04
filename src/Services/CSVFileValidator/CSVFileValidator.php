<?php
declare(strict_types=1);

namespace App\Services\CSVFileValidator;

use Symfony\Component\HttpFoundation\File\File;

class CSVFileValidator implements CSVFileValidatorInterface
{
    private static $validCSVExtensions = [
        'csv',
        'txt',
    ]; 

    public function validate(string $filePath): bool
    {
        //It throws FileNotFoundException when file don't exist
        $file = new File($filePath);
        $extension = $file->guessExtension();
        if (!in_array($extension, self::$validCSVExtensions)) {
            return false;
        }
        
        return true;

    }

}
