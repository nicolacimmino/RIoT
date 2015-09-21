<?php namespace App\RIoT\MessagingResources;

use App\Exceptions\InvalidMessageException;
use Exception;

abstract class MessagingResource
{

    private $resourceId;

    /**
     * @param $resourceId
     */
    public function __construct($resourceId = null)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * Add a message to this resource.
     * @param $message
     * @return mixed
     * @throws InvalidMessageException
     */
    public function addMessage($message)
    {
        try
        {
            $value = json_decode($message);
            $value->timestamp = gmdate("Y-m-d H:i:s");
            $jsonValue = json_encode($value);
        }
        catch(Exception $e)
        {
            throw new InvalidMessageException();
        }
        return $this->doAddMessage($jsonValue);
    }

    /**
     * Concrete implementation of addMessage.
     * @param $jsonMessage
     * @return mixed
     */
    protected abstract function doAddMessage($jsonMessage);

    /**
     * Get all the messages in this resource.
     * @return array
     */
    public function getMessages()
    {
        $messages = [];

        while ($message = $this->getMessage())
        {
            $messages[] = $message;
        }

        return $messages;
    }

    /**
     * Get the next message in this resource.
     * @return mixed
     */
    public function getMessage()
    {
        return $this->doGetMessage();
    }

    /**
     * Concrete implementation of getMessage.
     * @return mixed
     */
    public abstract function doGetMessage();

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * @param mixed $resourceId
     */
    public function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;
    }
}