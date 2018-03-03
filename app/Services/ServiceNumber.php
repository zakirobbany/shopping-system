<?php

namespace App\Services;

class ServiceNumber
{
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function modifiedNumber()
    {
        for ($i = 0;$i < strlen($this->number); $i++) {
            $array[] = str_pad(substr($this->number, $i, 1), strlen($this->number) - $i, 0, STR_PAD_RIGHT);
        }
        return $array;
    }
}