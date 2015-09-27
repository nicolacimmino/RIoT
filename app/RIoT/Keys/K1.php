<?php namespace App\RIoT\Keys;

use App\Exceptions\InvalidKeyException;

class K1 extends K
{

    public $secret;

    /**
     * @param $secret
     * @throws InvalidKeyException
     */
    public function __construct($secret)
    {
        if(strlen($secret) != 64)
        {
            throw new InvalidKeyException();
        }

        if(!ctype_xdigit($secret))
        {
            throw new InvalidKeyException();
        }

        $this->secret = $secret;
    }
}