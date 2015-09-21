<?php namespace App\Exceptions;


class InvalidMessageException extends RIoTException
{
    public function __construct()
    {
        $this->message = "INVALID_MESSAGE";
    }
}