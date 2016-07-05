<?php

namespace H4D\Patterns;

use H4D\Patterns\Collections\SubscribersCollection;
use H4D\Patterns\Interfaces\EventInterface;
use H4D\Patterns\Interfaces\PublisherInterface;
use H4D\Patterns\Traits\SubscribersAwareTrait;

class Publisher implements PublisherInterface
{
    use SubscribersAwareTrait;

    /**
     * Publisher constructor.
     */
    public function __construct()
    {
        $this->subscribers = new SubscribersCollection();
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
        foreach ($this->getSubscribers() as $subscriber)
        {
            $subscriber->update($event, $this);
        }
    }
    
}