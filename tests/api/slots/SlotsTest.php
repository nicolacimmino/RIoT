<?php namespace tests\api\slots;


class SlotsTest extends \TestCase {

    /**
     * Send a message to a slot and retrieve it.
     */
    public function testSlot()
    {
        $response = $this->call('POST',
            'slots/4043faf45f5b02c3a308d09c6d1f59f5862d7305eb5f9b5282641d97121ee807',
            [
               "value" => json_encode(
                   [
                       "test" => 123
                   ])
            ]);
        $this->assertEquals(201, $response->status());
        $this->assertContains("text/json", $response->headers->get("Content-Type"));
        $value = json_decode($response->getContent());
        $this->assertEquals($value->test, 123);

        $response = $this->call('GET', '/slots/4043faf45f5b02c3a308d09c6d1f59f5862d7305eb5f9b5282641d97121ee807');
        $this->assertEquals(200, $response->status());
        $this->assertContains("text/json", $response->headers->get("Content-Type"));
        $value = json_decode($response->getContent());
        $this->assertEquals($value->test, 123);

        // Gettings again the same resource should give same result for a slot
        $response = $this->call('GET', '/slots/4043faf45f5b02c3a308d09c6d1f59f5862d7305eb5f9b5282641d97121ee807');
        $this->assertEquals(200, $response->status());
        $this->assertContains("text/json", $response->headers->get("Content-Type"));
        $value = json_decode($response->getContent());
        $this->assertEquals($value->test, 123);

    }

    public function testInvalidSlot()
    {
        $response = $this->call('GET', '/slots/4043');
        $this->assertEquals(401, $response->status());
        $this->assertContains("text/json", $response->headers->get("Content-Type"));
        $value = json_decode($response->getContent());
        $this->assertEquals($value->status, "error");
        $this->assertEquals($value->error, "INVALID_RESOURCE");
    }
}