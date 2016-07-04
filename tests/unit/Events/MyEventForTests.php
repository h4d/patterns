<?php


namespace H4D\Patterns\Tests\Unit\Events;


use H4D\Patterns\Events\AbstractEvent;

class MyEventForTests extends AbstractEvent
{
    protected static $requiredContextFields = ['a', 'b'];
}