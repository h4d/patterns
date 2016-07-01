<?php


namespace H4D\Patterns;


use H4D\Patterns\Interfaces\EventInterface;
use H4D\Patterns\Interfaces\PublisherInterface;
use H4D\Patterns\Interfaces\SubscriberInterface;
use H4D\Patterns\Traits\SubscribersAwareTrait;
use SplObjectStorage;

class Publisher implements PublisherInterface
{
    use SubscribersAwareTrait;

    /**
     * Publisher constructor.
     */
    public function __construct()
    {
        $this->subscribers = new SplObjectStorage();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return __CLASS__;
    }

    /**
     * @param EventInterface $event
     */
    public function publish(EventInterface $event)
    {
        /** @var SubscriberInterface $subscriber */
        foreach ($this->subscribers as $subscriber)
        {
            $subscriber->update($event, $this);
        }
    }
    
}