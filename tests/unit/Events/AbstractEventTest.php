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
        $this->assertEquals($context, $event->getContext());
        $this->assertEquals($msg, $event->getMessage());
        $this->assertEquals('A', $event->getContextValue('a'));
        $this->assertEquals('B', $event->getContextValue('b'));
        $this->assertTrue($event->hasContextKey('a'));
        $this->assertTrue($event->hasContextKey('b'));
        $this->assertFalse($event->hasContextKey('c'));
        $this->assertTrue(is_int($event->getTimestamp()));
        $this->assertArrayHasKey('timestamp', $event->toArray());
        $this->assertArrayHasKey('message', $event->toArray());
        $this->assertArrayHasKey('context', $event->toArray());
        $this->assertEquals($msg, $event->toArray()['message']);
        $this->assertEquals($context, $event->toArray()['context']);
        $this->assertEquals($event->getTimestamp(), $event->toArray()['timestamp']);

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