<?php


namespace H4D\Patterns\Collections;


use H4D\Patterns\Interfaces\EventProcessorInterface;
use InvalidArgumentException;
use SplObjectStorage;

class EventProcessorsCollection extends SplObjectStorage
{
    /**
     * @param EventProcessorInterface $object
     * @param mixed $data
     */
    public function attach($object, $data = null)
    {
        if (!$object instanceof EventProcessorInterface)
        {
            throw new InvalidArgumentException();
        }
        parent::attach($object, $data);
    }

    /**
     * @param EventProcessorInterface $object
     */
    public function detach($object)
    {
        if (!$object instanceof EventProcessorInterface)
        {
            throw new InvalidArgumentException();
        }
        parent::detach($object);
    }

    /**
     * @param EventProcessorInterface $object
     *
     * @return bool
     */
    public function contains($object)
    {
        if (!$object instanceof EventProcessorInterface)
        {
            throw new InvalidArgumentException();
        }
        return parent::contains($object);
    }

    /**
     * @param EventProcessorInterface $object
     *
     * @return string
     */
    public function getHash($object)
    {
        if (!$object instanceof EventProcessorInterface)
        {
            throw new InvalidArgumentException();
        }
        return parent::getHash($object);
    }

    /**
     * @return EventProcessorInterface
     */
    public function current()
    {
        return parent::current();
    }

}