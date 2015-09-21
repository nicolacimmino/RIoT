<?php namespace tests\Middleware\RIoT\Keys;

use App\Exceptions\InvalidKeyException;
use App\Exceptions\InvalidResourceException;
use App\RIoT\Keys\K1;
use Exception;

class K1Test extends \TestCase
{

    public function testIsValidFor()
    {
        $k1 = new K1("a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3");
        $valid = $k1->isValidFor("173af653133d964edfc16cafe0aba33c8f500a07f3ba3f81943916910c257705");
        $this->assertTrue($valid);

        $valid = $k1->isValidFor("173af653133d964edfc16cafe0aba33c8f500a07f3ba3f81943916910c257709");
        $this->assertFalse($valid);
    }

    public function testValidateValidKey()
    {
        $k1 = new K1("a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3");
        $k1->validate("173af653133d964edfc16cafe0aba33c8f500a07f3ba3f81943916910c257705");
    }


    public function testValidateInvalidKey()
    {
        try
        {
            $k1 = new K1("a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3");
            $k1->validate("173af653133d964edfc16cafe0aba33c8f500a07f3ba3f81943916910c257706");
            $this->fail("Should have thrown invalid key.");
        } catch (Exception $e)
        {
            $this->assertEquals($e->getMessage(), "INVALID_KEY", "Unexpected exception " . $e->getMessage());
            $this->assertInstanceOf(InvalidKeyException::class, $e);
        }
    }

    /**
     * Too short K1 even though resource name is valid for the key
     */
    public function testValidateShortKey()
    {
        try
        {
            $k1 = new K1("a665a");
            $k1->validate("1c3385acbf94da0570cceb41c919540b0e7cbe8be3cc38276a1364e37075749a");
            $this->fail("Should have thrown invalid key.");
        } catch (Exception $e)
        {
            $this->assertEquals($e->getMessage(), "INVALID_KEY", "Unexpected exception " . $e->getMessage());
            $this->assertInstanceOf(InvalidKeyException::class, $e);
        }
    }

    /**
     * Null key
     */
    public function testValidateNullKey()
    {
        try
        {
            $k1 = new K1(null);
            $k1->validate("1c3385acbf94da0570cceb41c919540b0e7cbe8be3cc38276a1364e37075749a");
            $this->fail("Should have thrown invalid key.");
        } catch (Exception $e)
        {
            $this->assertEquals($e->getMessage(), "INVALID_KEY", "Unexpected exception " . $e->getMessage());
            $this->assertInstanceOf(InvalidKeyException::class, $e);
        }
    }

    /**
     * Too short resource
     */
    public function testTooShortResource()
    {
        try
        {
            $k1 = new K1("a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3");
            $k1->validate("123123");
            $this->fail("Should have thrown invalid resource.");
        } catch (Exception $e)
        {
            $this->assertEquals($e->getMessage(), "INVALID_RESOURCE", "Unexpected exception " . $e->getMessage());
            $this->assertInstanceOf(InvalidResourceException::class, $e);
        }
    }
}