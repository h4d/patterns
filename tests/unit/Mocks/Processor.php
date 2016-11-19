<?php


namespace H4D\Patterns\Tests\Unit\Mocks;


use H4D\Patterns\Interfaces\EventInterface;
use H4D\Patterns\Interfaces\EventProcessorInterface;

class Processor implements EventProcessorInterface
{

    /**
     * @param EventInterface $event
     *
     * @return void
     */
    public function process(EventInterface $event)
    {

    }
}