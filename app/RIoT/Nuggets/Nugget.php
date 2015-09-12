<?php namespace App\Http\Middleware\RIoT;

use app\Exceptions\InvalidNuggetException;
use Symfony\Component\HttpFoundation\Request;

abstract class NuggetValidator
{


    public function validate(String $nugget, String $data)
    {
        if (!$nugget)
        {
            throw new InvalidNuggetException();
        }

        if (!$data)
        {
            throw new InvalidNuggetException();
        }

        list($element, $key, $hmac) = explode(":", $nugget);

        $signatureString = sprintf("%s+%s", $this->getElement(), $data);

        $expectedNugget = hash_hmac("SHA256", $signatureString, $key);

        if ($expectedNugget != $nugget)
        {
            throw new InvalidNuggetException();
        }

        if (substr($expectedNugget, 0, $this->getNuggetLeadingZeros()) != str_repeat("0", $this->getNuggetLeadingZeros()))
        {
            throw new InvalidNuggetException();
        }
    }

    /**
     * Get the nugget element identifier.
     *
     * @return String
     */
    public abstract function getElement();

    /**
     * Get the amount of leading zeros for this nugget type.
     *
     * @return mixed
     */
    public abstract function getNuggetLeadingZeros();
}