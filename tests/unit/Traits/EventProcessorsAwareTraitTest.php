<?php

namespace unit\Traits;

use H4D\Patterns\Collections\EventProcessorsCollection;
use H4D\Patterns\Tests\Unit\Mocks\HasEventProcessors;
use H4D\Patterns\Tests\Unit\Mocks\Processor;
use H4D\Patterns\Tests\Unit\PrivateAccessTrait;

class EventProcessorsAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    use PrivateAccessTrait;

    public function test_attachProcessor_addsProcessor()
    {
        $proc1 = new Processor();
        $proc2 = new Processor();
        $hasProcessors = new HasEventProcessors();

        $hasProcessors->attachProcessor($proc1);
        /** @var EventProcessorsCollection $collection */
        $collection = $this->getNonPublicPropertyValue($hasProcessors, 'processors');
        $this->assertTrue($collection->contains($proc1));

        $hasProcessors->attachProcessor($proc2);
        /** @var EventProcessorsCollection $collection */
        $collection = $this->getNonPublicPropertyValue($hasProcessors, 'processors');
        $this->assertTrue($collection->contains($proc2));

    }

    /**
     * @depends test_attachProcessor_addsProcessor
     */
    public function test_detachProcessor_removesProcessor()
    {
        $proc1 = new Processor();
        $proc2 = new Processor();
        $hasProcessors = new HasEventProcessors();

        $hasProcessors->attachProcessor($proc1);
        /** @var EventProcessorsCollection $collection */
        $collection = $this->getNonPublicPropertyValue($hasProcessors, 'processors');
        $this->assertTrue($collection->contains($proc1));

        $hasProcessors->attachProcessor($proc2);
        /** @var EventProcessorsCollection $collection */
        $collection = $this->getNonPublicPropertyValue($hasProcessors, 'processors');
        $this->assertTrue($collection->contains($proc2));

        $hasProcessors->detachProcessor($proc2);
        $this->assertFalse($collection->contains($proc2));

        $hasProcessors->detachProcessor($proc1);
        $this->assertFalse($collection->contains($proc1));

    }

    /**
     * @depends test_attachProcessor_addsProcessor
     */
    public function test_hasSubscriber_worksProperly()
    {
        $proc1 = new Processor();
        $proc2 = new Processor();
        $hasProcessors = new HasEventProcessors();
        $hasProcessors->attachProcessor($proc1);
        $this->assertTrue($hasProcessors->hasProcessor($proc1));
        $this->assertFalse($hasProcessors->hasProcessor($proc2));
    }

    /**
     * @depends test_attachProcessor_addsProcessor
     * @depends test_detachProcessor_removesProcessor
     */
    public function test_getSubscriber_worksProperly()
    {
        $proc1 = new Processor();
        $hasProcessors = new HasEventProcessors();

        /** @var EventProcessorsCollection $collection */
        $collection = $this->getNonPublicPropertyValue($hasProcessors, 'processors');
        $this->assertEquals($collection, $hasProcessors->getProcessors());

        $hasProcessors->attachProcessor($proc1);
        $collection = $this->getNonPublicPropertyValue($hasProcessors, 'processors');
        $this->assertEquals($collection, $hasProcessors->getProcessors());

        $hasProcessors->detachProcessor($proc1);
        $collection = $this->getNonPublicPropertyValue($hasProcessors, 'processors');
        $this->assertEquals($collection, $hasProcessors->getProcessors());
    }

}