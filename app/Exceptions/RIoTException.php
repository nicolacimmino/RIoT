<?php namespace App\Exceptions;

use Exception;

class RIoTException extends Exception
{
    public function __construct()
    {
        // InvalidSomethingException
        $class = (new \ReflectionClass($this))->getShortName();

        // InvalidSomething
        $exceptionName = str_replace("Exception", "", $class);

        // Invalid, Something
        $tokens = array_filter(preg_split('/(?=[A-Z])/',$exceptionName));

        // INVALID_SOMETHING
        $this->message = strtoupper(implode("_", $tokens));
    }
}