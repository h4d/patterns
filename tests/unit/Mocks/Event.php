<?php


namespace H4D\Patterns\Tests\Unit\Mocks;


use H4D\Patterns\Collections\ArrayCollection;
use H4D\Patterns\Interfaces\EventInterface;

class Event implements EventInterface
{

    /**
     * @return string
     */
    public function getMessage()
    {
        return "My test event!";
    }

    /**
     * @return ArrayCollection
     */
    public function getContext()
    {
        return new ArrayCollection([]);
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return 123;
    }
}