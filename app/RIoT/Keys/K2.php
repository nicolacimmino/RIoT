<?php namespace App\RIoT\Keys;

use App\Exceptions\InvalidKeyException;
use App\Exceptions\InvalidMessageException;

class K2 extends K
{

    /**
     * @var String
     */
    public $secret;

    /**
     * @var String
     */
    public $hmacLength;

    /**
     * @param $k2
     * @throws InvalidKeyException
     */
    public function __construct($k2)
    {
        try
        {
            $k2 = json_decode($k2);

            $this->secret = $k2->secret;
            $this->hmacLength = $k2->hmacLength;
        }
        catch(\Exception $e)
        {
            throw new InvalidKeyException();
        }
    }

    /**
     * @param $message
     * @param $nonce
     * @param $hmac
     * @throws InvalidMessageException
     */
    public function validate($message, $nonce, $hmac)
    {
        if(!$this->isValidFor($message, $nonce, $hmac))
        {
            throw new InvalidMessageException();
        }
    }

    /**
     * @param $message
     * @param $nonce
     * @param $hmac
     * @return bool
     */
    public function isValidFor($message, $nonce, $hmac)
    {
        if($this->secret == null)
        {
            return true;
        }

        $expectedHmac = substr(hash_hmac("sha256", $nonce . ":" . $message, $this->secret), 0, $this->hmacLength / 4);

        return $expectedHmac === $hmac;
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode(
            [
                 "secret" => $this->secret,
                 "hmacLength" => $this->hmacLength,
            ]
        );
    }
}