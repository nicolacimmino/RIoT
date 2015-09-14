<?php namespace App\RIoT\MessagingResources;

use Illuminate\Support\Facades\Cache;

/**
 * A Slot contains a single message that is not delete upon retrieval.
 *
 * Class Slot
 * @package app\RIoT\MessagingResources
 */
class Slot extends MessagingResource
{
    /**
     * Concrete implementation of getMessage.
     * @return mixed
     */
    public function doGetMessage()
    {
        return Cache::get("SLOT_" . $this->getResourceId());

    }

    /**
     * Concrete implementation of addMessage.
     * @param $jsonMessage
     * @return mixed
     */
    protected function doAddMessage($jsonMessage)
    {
        Cache::put("SLOT_" . $this->getResourceId(), $jsonMessage, 10);

        return $jsonMessage;
    }
}