<?php namespace tests\Middleware\RIoT\Keys;

use App\Exceptions\InvalidKeyException;
use App\RIoT\Keys\K1;

class K1Test extends \TestCase
{

    public function testValidKey()
    {
        $k1 = new K1("a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3");
    }

    public function testInvalidKey()
    {
        $this->setExpectedException(InvalidKeyException::class);
        new K1("a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae");
    }

    public function testNullKey()
    {
        $this->setExpectedException(InvalidKeyException::class);
        new K1(null);
    }

    public function testNonHexKey()
    {
        $this->setExpectedException(InvalidKeyException::class);
        new K1("ZZ65a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3");
    }

}