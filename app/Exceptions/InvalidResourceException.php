<?php namespace App\Exceptions;


class InvalidResourceException extends RIoTException {

    public function __construct()
    {
        $this->message = "INVALID_RESOURCE";
    }
}