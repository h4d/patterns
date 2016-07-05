<?php


namespace H4D\Patterns\Collections;


use H4D\Patterns\Interfaces\SubscriberInterface;
use InvalidArgumentException;
use SplObjectStorage;

class SubscribersCollection extends SplObjectStorage
{
    /**
     * @param SubscriberInterface $object
     * @param mixed $data
     */
    public function attach($object, $data = null)
    {
        if (!$object instanceof SubscriberInterface)
        {
            throw new InvalidArgumentException();
        }
        parent::attach($object, $data);
    }

    /**
     * @param SubscriberInterface $object
     */
    public function detach($object)
    {
        if (!$object instanceof SubscriberInterface)
        {
            throw new InvalidArgumentException();
        }
        parent::detach($object);
    }

    /**
     * @param SubscriberInterface $object
     *
     * @return bool
     */
    public function contains($object)
    {
        if (!$object instanceof SubscriberInterface)
        {
            throw new InvalidArgumentException();
        }
        return parent::contains($object);
    }

    /**
     * @param SubscriberInterface $object
     *
     * @return string
     */
    public function getHash($object)
    {
        if (!$object instanceof SubscriberInterface)
        {
            throw new InvalidArgumentException();
        }
        return parent::getHash($object);
    }

    /**
     * @return SubscriberInterface
     */
    public function current()
    {
        return parent::current();
    }

}