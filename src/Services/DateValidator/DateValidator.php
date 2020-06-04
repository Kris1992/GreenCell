<?php
declare(strict_types=1);

namespace App\Services\DateValidator;

class DateValidator implements DateValidatorInterface
{

    public function validate(string $date): bool
    {
        $dateNew = explode("-", $date);

        return checkdate(intval($dateNew[1]), intval($dateNew[2]), intval($dateNew[0]));
    }

}
