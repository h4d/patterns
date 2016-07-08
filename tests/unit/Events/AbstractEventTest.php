<?php


namespace H4D\Patterns\Tests\Unit\Events;


use H4D\Patterns\Interfaces\EventInterface;

class AbstractEventTest extends \PHPUnit_Framework_TestCase
{

    public function test_interfaceMethods_workProperly()
    {
        $context = ['a'=>'A', 'b'=>'B'];
        $msg = 'Test event';
        $event = new MyEventForTests($msg, $context);
        $this->assertTrue($event instanceof EventInterface);
        $this->assertEquals($context, $event->getContext()->getAll());
        $this->assertEquals($msg, $event->getMessage());
        $this->assertEquals('A', $event->getContext()->get('a'));
        $this->assertEquals('B', $event->getContext()->get('b'));
        $this->assertTrue($event->getContext()->has('a'));
        $this->assertTrue($event->getContext()->has('b'));
        $this->assertFalse($event->getContext()->has('c'));
        $this->assertTrue(is_int($event->getTimestamp()));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_constructor_withBadContext_throwsException()
    {
        $context = [];
        $msg = 'Test event';
        new MyEventForTests($msg, $context);
    }
}