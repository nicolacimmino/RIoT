<?php namespace tests\api\slots;


class SlotsKeysTest extends \TestCase
{

    public function testInvalidKeys()
    {

        // K1 is a valid key but not for this resource.
        $response = $this->call('GET',
            'slots/a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3/keys/k2?k1=fccda8faefebb2ec17684836d4dd8793011ea79da7244e0e04d2460bef080e3c'
        );
        $this->assertEquals(401, $response->status());
        $this->assertContains("text/json", $response->headers->get("Content-Type"));
        $value = json_decode($response->getContent());
        $this->assertEquals($value->status, "error");
        $this->assertEquals($value->error, "INVALID_KEY");

        // K1 is a invalid.
        $response = $this->call('GET',
            'slots/a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3/keys/k2?k1=abc'
        );
        $this->assertEquals(401, $response->status());
        $this->assertContains("text/json", $response->headers->get("Content-Type"));
        $value = json_decode($response->getContent());
        $this->assertEquals($value->status, "error");
        $this->assertEquals($value->error, "INVALID_KEY");

    }

    public function testValidKey()
    {

        $response = $this->call('GET',
            'slots/be79783dc6e7b5467feeb961bbdcaeb3be4c2b52b9c7fe0068581456b74bb0f7/keys/k2?k1=fccda8faefebb2ec17684836d4dd8793011ea79da7244e0e04d2460bef080e3c'
        );
        $this->assertEquals(200, $response->status());
        $this->assertContains("text/json", $response->headers->get("Content-Type"));

    }

    public function testInstallK2()
    {
        $response = $this->call('PUT',
            'slots/be79783dc6e7b5467feeb961bbdcaeb3be4c2b52b9c7fe0068581456b74bb0f7/keys/k2?k1=fccda8faefebb2ec17684836d4dd8793011ea79da7244e0e04d2460bef080e3c',
            [], [], [], [],
            json_encode(
                [
                    "secret"     => "secret1",
                    "hmacLength" => 32
                ])
        );

        $response = $this->call('GET',
            'slots/be79783dc6e7b5467feeb961bbdcaeb3be4c2b52b9c7fe0068581456b74bb0f7/keys/k2?k1=fccda8faefebb2ec17684836d4dd8793011ea79da7244e0e04d2460bef080e3c'
        );
        $this->assertEquals(200, $response->status());
        $this->assertContains("text/json", $response->headers->get("Content-Type"));
        $value = json_decode($response->getContent());
        $this->assertEquals($value->secret, "secret1");
        $this->assertEquals($value->hmacLength, 32);

        $response = $this->call('PUT',
            'slots/be79783dc6e7b5467feeb961bbdcaeb3be4c2b52b9c7fe0068581456b74bb0f7/keys/k2?k1=fccda8faefebb2ec17684836d4dd8793011ea79da7244e0e04d2460bef080e3c',
            [], [], [], [],
            json_encode(
                [
                    "secret"     => "secret2",
                    "hmacLength" => 64
                ])
        );
        $this->assertEquals(204, $response->status());

        $response = $this->call('GET',
            'slots/be79783dc6e7b5467feeb961bbdcaeb3be4c2b52b9c7fe0068581456b74bb0f7/keys/k2?k1=fccda8faefebb2ec17684836d4dd8793011ea79da7244e0e04d2460bef080e3c'
        );
        $this->assertEquals(200, $response->status());
        $this->assertContains("text/json", $response->headers->get("Content-Type"));
        $value = json_decode($response->getContent());
        $this->assertEquals($value->secret, "secret2");
        $this->assertEquals($value->hmacLength, 64);

    }

}