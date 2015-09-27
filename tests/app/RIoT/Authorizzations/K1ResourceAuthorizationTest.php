<?php namespace tests\app\http\middleware\RIoT;

use App\Exceptions\UnauthorizedException;
use App\RIoT\Authorizations\K1ResourceAuthorization;
use App\RIoT\Keys\K1;
use App\RIoT\MessagingResources\MessagingResource;
use App\RIoT\MessagingResources\Slot;

class K1AuthenticationTest extends \TestCase {

    public function testAuthorized()
    {
        $k1 = new K1("a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3");
        $resource = new Slot("173af653133d964edfc16cafe0aba33c8f500a07f3ba3f81943916910c257705");
        $authorization = new K1ResourceAuthorization();
        $authorization->authorize($resource, $k1);
    }

    public function testUnauthorizedWrongK1()
    {
        $k1 = new K1("a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3");
        $resource = new Slot("173af653133d964edfc16cafe0aba33c8f500a07f3ba3f81943916910c257709");
        $authorization = new K1ResourceAuthorization();
        $this->setExpectedException(UnauthorizedException::class);
        $authorization->authorize($resource, $k1);
    }

//
//    public function testValidateValidKey()
//    {
//        $k1 = new K1("a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3");
//        $k1->validate("173af653133d964edfc16cafe0aba33c8f500a07f3ba3f81943916910c257705");
//    }
//
//
//    public function testValidateInvalidKey()
//    {
//        try
//        {
//            $k1 = new K1("a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3");
//            $k1->validate("173af653133d964edfc16cafe0aba33c8f500a07f3ba3f81943916910c257706");
//            $this->fail("Should have thrown invalid key.");
//        } catch (Exception $e)
//        {
//            $this->assertEquals($e->getMessage(), "INVALID_KEY", "Unexpected exception " . $e->getMessage());
//            $this->assertInstanceOf(InvalidKeyException::class, $e);
//        }
//    }
//
//    /**
//     * Too short K1 even though resource name is valid for the key
//     */
//    public function testValidateShortKey()
//    {
//        try
//        {
//            $k1 = new K1("a665a");
//            $k1->validate("1c3385acbf94da0570cceb41c919540b0e7cbe8be3cc38276a1364e37075749a");
//            $this->fail("Should have thrown invalid key.");
//        } catch (Exception $e)
//        {
//            $this->assertEquals($e->getMessage(), "INVALID_KEY", "Unexpected exception " . $e->getMessage());
//            $this->assertInstanceOf(InvalidKeyException::class, $e);
//        }
//    }
//
//    /**
//     * Null key
//     */
//    public function testValidateNullKey()
//    {
//        try
//        {
//            $k1 = new K1(null);
//            $k1->validate("1c3385acbf94da0570cceb41c919540b0e7cbe8be3cc38276a1364e37075749a");
//            $this->fail("Should have thrown invalid key.");
//        } catch (Exception $e)
//        {
//            $this->assertEquals($e->getMessage(), "INVALID_KEY", "Unexpected exception " . $e->getMessage());
//            $this->assertInstanceOf(InvalidKeyException::class, $e);
//        }
//    }
//
//    /**
//     * Too short resource
//     */
//    public function testTooShortResource()
//    {
//        try
//        {
//            $k1 = new K1("a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3");
//            $k1->validate("123123");
//            $this->fail("Should have thrown invalid resource.");
//        } catch (Exception $e)
//        {
//            $this->assertEquals($e->getMessage(), "INVALID_RESOURCE", "Unexpected exception " . $e->getMessage());
//            $this->assertInstanceOf(InvalidResourceException::class, $e);
//        }
//    }
}