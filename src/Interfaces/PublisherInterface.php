<?php


namespace H4D\Patterns\Interfaces;


interface PublisherInterface
{
    /**
     * @return string
     */
    public function getName();
    /**
     * @param EventInterface $event
     */
    public function publish(EventInterface $event);

    /**
     * @param SubscriberInterface $subscriber
     */
    public function attachSubscriber(SubscriberInterface $subscriber);

    /**
     * @param SubscriberInterface $subscriber
     */
    public function detachSubscriber(SubscriberInterface $subscriber);

    /**
     * @param SubscriberInterface $subscriberInterface
     *
     * @return bool
     */
    public function hasSubscriber(SubscriberInterface $subscriberInterface);

}