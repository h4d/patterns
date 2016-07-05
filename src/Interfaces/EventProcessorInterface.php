<?php


namespace H4D\Patterns\Interfaces;


interface EventProcessorInterface
{
    /**
     * @param EventInterface $event
     *
     * @return void
     */
    public function process(EventInterface $event);
}