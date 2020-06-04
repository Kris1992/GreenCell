<?php
declare(strict_types=1);

namespace App\Services\ArraySorter;

/**
 *  Contract to sort array by key 
 */
interface ArraySorterInterface
{   

    /**
     * [sort Sort data in array by given key]
     * @param  Array  $data Array with data to sort
     * @param  string $key  Key
     * @param  string $mode Mode of sort ASC or DESC. Default 'ASC' [optional]
     * @throws Exception    Throw Exception when given key doesn't exist in array
     * @return Array        Return sorted array
     */
    public function sort(Array $data, string $key, string $mode = 'ASC'): Array;

}
