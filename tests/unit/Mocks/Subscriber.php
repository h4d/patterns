<?php


namespace H4D\Patterns\Tests\Unit\Mocks;


use H4D\Patterns\Interfaces\EventInterface;
use H4D\Patterns\Interfaces\PublisherInterface;
use H4D\Patterns\Interfaces\SubscriberInterface;

class Subscriber implements SubscriberInterface
{
    protected $counter = 0;

    /**
     * @param EventInterface $event
     * @param PublisherInterface $publisher
     */
    public function update(EventInterface $event, PublisherInterface $publisher)
    {
        $this->counter = $this->counter + 1;
    }

    /**
     * @return int
     */
    public function getCounterValue()
    {
        return $this->counter;
    }
}