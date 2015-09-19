<?php namespace App\RIoT\Keys;

use App\Exceptions\InvalidKeyException;

class K1 extends K
{

    private $k1;

    /**
     * @param $k1
     */
    public function __construct($k1)
    {
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
     */
    public function isValidFor($resource)
    {
        return hash("sha256", $this->k1) === $resource;
    }
}