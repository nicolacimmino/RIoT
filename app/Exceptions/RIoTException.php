<?php namespace App\Exceptions;

use Exception;

class RIoTException extends Exception
{
    public function __construct()
    {
        $class = (new \ReflectionClass($this))->getShortName();

        $exceptionName = str_replace("Exception", "", $class);

        $tokens = array_filter(preg_split('/(?=[A-Z])/',$exceptionName));

        $this->message = strtoupper(implode("_", $tokens));
    }
}