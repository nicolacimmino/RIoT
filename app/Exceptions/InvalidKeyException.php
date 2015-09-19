<?php namespace App\Exceptions;


class InvalidKeyException extends RIoTException {

    public function __construct()
    {
        $this->message = "INVALID_KEY";
    }
}