<?php namespace tests\app\RIoT\MessagingResources;

use App\Exceptions\InvalidMessageException;
use App\RIoT\MessagingResources\Slot;

class SlotTest extends \TestCase {

    public function testSlot()
    {
        $slot = new Slot("e7302379c348f6e2107ac1231c7e94694324b865a0705d6ac0d3fe10432f7ee7");
        $slot->addMessage(json_encode(["a" => 10]));
        $message = json_decode($slot->getMessage());

        $this->assertEquals(10, $message->a);

        $slot->addMessage(json_encode(["a" => 15]));
        $slot->addMessage(json_encode(["a" => 20]));

        $message = json_decode($slot->getMessage());
        $this->assertEquals(20, $message->a);

        $message = json_decode($slot->peekMessage());
        $this->assertEquals(20, $message->a);

    }

    public function testInvalidMessageType()
    {
        try
        {
            $slot = new Slot("e7302379c348f6e2107ac1231c7e94694324b865a0705d6ac0d3fe10432f7ee7");
            $slot->addMessage("test");
            $this->fail("This should have thrown invalid message");
        }
        catch(\Exception $e)
        {
            $this->assertEquals($e->getMessage(), "INVALID_MESSAGE", "Unexpected exception " . $e->getMessage());
            $this->assertInstanceOf(InvalidMessageException::class, $e);
        }
    }
}