<?php


namespace H4D\Patterns\Interfaces;


interface EventProcessor
{
    /**
     * @param EventInterface $event
     *
     * @return void
     */
    public function process(EventInterface $event);
}