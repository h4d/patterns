<?php


namespace H4D\Patterns\Traits;


use H4D\Patterns\Collections\EventProcessorsCollection;
use H4D\Patterns\Interfaces\EventProcessorInterface;

trait EventProcessorsAwareTrait
{
    /**
     * @var EventProcessorsCollection
     */
    protected $processors;

    /**
     * @param EventProcessorInterface $subscriber
     */
    public function attachSubscriber(EventProcessorInterface $subscriber)
    {
        $this->processors->attach($subscriber);
    }

    /**
     * @param EventProcessorInterface $subscriber
     */
    public function detachSubscriber(EventProcessorInterface $subscriber)
    {
        $this->processors->detach($subscriber);
    }

    /**
     * @param EventProcessorInterface $subscriberInterface
     *
     * @return bool
     */
    public function hasSubscriber(EventProcessorInterface $subscriberInterface)
    {
        return $this->processors->contains($subscriberInterface);
    }

    /**
     * @return EventProcessorsCollection
     */
    public function getProcessors()
    {
        return $this->processors;
    }
}