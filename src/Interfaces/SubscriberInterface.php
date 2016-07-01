<?php


namespace H4D\Patterns\Interfaces;


interface SubscriberInterface
{
    /**
     * @param EventInterface $event
     * @param PublisherInterface $publisher
     */
    public function update(EventInterface $event, PublisherInterface $publisher);
}