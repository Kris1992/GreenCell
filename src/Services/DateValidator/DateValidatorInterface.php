<?php
declare(strict_types=1);

namespace App\Services\DateValidator;

/**
 *  Contract to validate DateTime format
 */
interface DateValidatorInterface
{   
    /**
     * [validate Validate DateTime format]
     * @param  string $date String with date to validate
     * @return bool
     */
    public function validate(string $date): bool;

}
