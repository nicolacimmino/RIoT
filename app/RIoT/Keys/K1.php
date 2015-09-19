<?php namespace App\RIoT;

use app\Exceptions\InvalidKeyException;

class K1
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
        return hash("sha256", $resource) === $this->k1;
    }
}