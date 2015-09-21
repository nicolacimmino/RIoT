<?php namespace App\RIoT\Keys;

use App\Exceptions\InvalidKeyException;
use App\Exceptions\InvalidResourceException;

class K1 extends K
{

    private $k1;

    /**
     * @param $k1
     * @throws InvalidKeyException
     */
    public function __construct($k1)
    {
        if(strlen($k1) != 64)
        {
            throw new InvalidKeyException();
        }

        $this->k1 = $k1;
    }

    /**
     * @param $resource
     * @throws InvalidKeyException
     */
    public function validate($resource)
    {
        if (!$this->isValidFor($resource))
        {
            throw new InvalidKeyException();
        }
    }

    /**
     * @param $resource
     * @return bool
     * @throws InvalidResourceException
     */
    public function isValidFor($resource)
    {
        if(strlen($resource) != 64)
        {
            throw new InvalidResourceException();
        }
        return hash("sha256", $this->k1) === $resource;
    }
}