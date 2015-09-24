<?php namespace tests\Middleware\RIoT\Keys;

use App\RIoT\Keys\K2;

class K2Test extends \TestCase
{

    public function testIsValidFor()
    {
        $k2 = new K2(json_encode(
            [
                "secret" =>"a665a459204",
                "hmacLength" => 64
            ]

        ));
        $valid = $k2->isValidFor("test", 123, "cc635ac9ea7ac003");
        $this->assertTrue($valid);

        $valid = $k2->isValidFor("test", 123, "cc635ac9ea7ac00343bea5a1a97d4b70207b0776f3bd485d34980db8af2ae2b6");
        $this->assertFalse($valid);

        $valid = $k2->isValidFor("test", 124, "cc635ac9ea7ac00343bea5a1a97d4b70207b0776f3bd485d34980db8af2ae2b6");
        $this->assertFalse($valid);
    }
}