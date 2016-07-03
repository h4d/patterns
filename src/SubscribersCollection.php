<?php


namespace H4D\Patterns;


use H4D\Patterns\Interfaces\SubscriberInterface;
use SplObjectStorage;

class SubscribersCollection extends SplObjectStorage
{
    /**
     * @param SubscriberInterface $object
     * @param mixed $data
     */
    public function attach(SubscriberInterface $object, $data = null)
    {
        parent::attach($object, $data);
    }

    /**
     * @param SubscriberInterface $object
     */
    public function detach(SubscriberInterface $object)
    {
        parent::detach($object);
    }

    /**
     * @param SubscriberInterface $object
     *
     * @return bool
     */
    public function contains(SubscriberInterface $object)
    {
        return parent::contains($object);
    }

    /**
     * @param SubscriberInterface $object
     *
     * @return string
     */
    public function getHash(SubscriberInterface  $object)
    {
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