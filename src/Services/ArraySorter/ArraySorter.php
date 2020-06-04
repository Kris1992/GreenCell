<?php
declare(strict_types=1);

namespace App\Services\ArraySorter;

class ArraySorter implements ArraySorterInterface
{
    
    public function sort(Array $data, string $key, string $mode = 'ASC'): Array
    {

        $newArray = array_column($data, $key);
        if (!$newArray) {
            throw new \Exception("Given array key to sort doesn't exist.");   
        }

        switch ($mode) {
            case 'DESC':
                array_multisort($newArray, SORT_DESC, $data);
                break;
            default:
                array_multisort($newArray, SORT_ASC, $data);
                break;
        }

        return $data;
        
    }

}
