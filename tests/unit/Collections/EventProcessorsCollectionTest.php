<?php


namespace H4D\Patterns\Tests\Unit\Collections;


use H4D\Patterns\Collections\EventProcessorsCollection;
use H4D\Patterns\Interfaces\EventProcessorInterface;
use H4D\Patterns\Tests\Unit\Mocks\Processor;

class EventProcessorsCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_attach_withBadParam_throwsException()
    {
        $collection = new EventProcessorsCollection();
        $badParam = new \DateTime();
        /** @noinspection PhpParamsInspection */
        $collection->attach($badParam);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_detach_withBadParam_throwsException()
    {
        $collection = new EventProcessorsCollection();
        $badParam = new \DateTime();
        /** @noinspection PhpParamsInspection */
        $collection->detach($badParam);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_contains_withBadParam_throwsException()
    {
        $collection = new EventProcessorsCollection();
        $badParam = new \DateTime();
        /** @noinspection PhpParamsInspection */
        $collection->contains($badParam);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_getHash_withBadParam_throwsException()
    {
        $collection = new EventProcessorsCollection();
        $badParam = new \DateTime();
        /** @noinspection PhpParamsInspection */
        $collection->getHash($badParam);
    }

    public function test_current_returnsNullOrSubscriberInterface()
    {
        $collection = new EventProcessorsCollection();
        $this->assertNull($collection->current());
        $collection->attach(new Processor());
        foreach ($collection as $item)
        {
            $this->assertTrue($item instanceof EventProcessorInterface);
        }
    }
}