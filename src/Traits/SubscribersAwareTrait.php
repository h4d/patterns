<?php


namespace H4D\Patterns\Traits;

use H4D\Patterns\Interfaces\SubscriberInterface;
use SplObjectStorage;

trait SubscribersAwareTrait
{
    /**
     * @var SplObjectStorage
     */
    protected $subscribers;

    /**
     * @param SubscriberInterface $subscriber
     */
    public function attachSubscriber(SubscriberInterface $subscriber)
    {
        $this->subscribers->attach($subscriber);
    }

    /**
     * @param SubscriberInterface $subscriber
     */
    public function detachSubscriber(SubscriberInterface $subscriber)
    {
        $this->subscribers->detach($subscriber);
    }

    /**
     * @param SubscriberInterface $subscriberInterface
     *
     * @return bool
     */
    public function hasSubscriber(SubscriberInterface $subscriberInterface)
    {
        return $this->subscribers->contains($subscriberInterface);
    }
    

}