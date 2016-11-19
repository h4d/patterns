<?php


namespace H4D\Patterns\Tests\Unit;


use H4D\Patterns\Collections\SubscribersCollection;
use H4D\Patterns\Publisher;
use H4D\Patterns\Tests\Unit\Mocks\Event;
use H4D\Patterns\Tests\Unit\Mocks\Subscriber;

class PublisherTest extends \PHPUnit_Framework_TestCase
{
    use PrivateAccessTrait;

    public function test_construct_resturnsProperInstance()
    {
        $publisher = new Publisher();
        $this->assertTrue($publisher instanceof Publisher);
        $this->assertTrue($this->getNonPublicPropertyValue($publisher, 'subscribers') instanceof SubscribersCollection);
    }

    public function test_getName_retunsPublishersClassName()
    {
        $publisher = new Publisher();
        $this->assertEquals(get_class($publisher), $publisher->getName());
    }

    public function test_publish_callsSubscribersUpdateMethod()
    {
        $publisher = new Publisher();
        $subscriber = new Subscriber();
        $publisher->attachSubscriber($subscriber);
        $this->assertEquals(0, $subscriber->getCounterValue());
        $publisher->publish(new Event());
        $this->assertEquals(1, $subscriber->getCounterValue());
        $publisher->publish(new Event());
        $this->assertEquals(2, $subscriber->getCounterValue());
    }
}