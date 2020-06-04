<?php
declare(strict_types=1);

namespace App\Services\DateValidator;

class DateValidator implements DateValidatorInterface
{

    public function validate(string $date): bool
    {
        $dateNew = explode("-", $date);
        $dateNew[0] = substr($dateNew[0], 1);
        $dateNew[1] = ltrim($dateNew[1], '0');
        $dateNew[2] = ltrim($dateNew[2], '0');

        return checkdate(intval($dateNew[1]), intval($dateNew[2]), intval($dateNew[0]));
    }

}
