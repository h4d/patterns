<?php

namespace unit\Traits;

use H4D\Patterns\Collections\SubscribersCollection;
use H4D\Patterns\Tests\Unit\Mocks\HasSubscribers;
use H4D\Patterns\Tests\Unit\Mocks\Subscriber;
use H4D\Patterns\Tests\Unit\PrivateAccessTrait;

class SubscribersAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    use PrivateAccessTrait;

    public function test_attachSubscriber_addSubscriber()
    {
        $sub1 = new Subscriber();
        $sub2 = new Subscriber();
        $hasSubs = new HasSubscribers();

        $hasSubs->attachSubscriber($sub1);
        /** @var SubscribersCollection $subsCollection */
        $subsCollection = $this->getNonPublicPropertyValue($hasSubs, 'subscribers');
        $this->assertTrue($subsCollection->contains($sub1));

        $hasSubs->attachSubscriber($sub2);
        /** @var SubscribersCollection $subsCollection */
        $subsCollection = $this->getNonPublicPropertyValue($hasSubs, 'subscribers');
        $this->assertTrue($subsCollection->contains($sub2));

    }

    /**
     * @depends test_attachSubscriber_addSubscriber
     */
    public function test_dettachSubscriber_removeSubscriber()
    {
        $sub1 = new Subscriber();
        $sub2 = new Subscriber();
        $hasSubs = new HasSubscribers();

        $hasSubs->attachSubscriber($sub1);
        /** @var SubscribersCollection $subsCollection */
        $subsCollection = $this->getNonPublicPropertyValue($hasSubs, 'subscribers');
        $this->assertTrue($subsCollection->contains($sub1));

        $hasSubs->attachSubscriber($sub2);
        /** @var SubscribersCollection $subsCollection */
        $subsCollection = $this->getNonPublicPropertyValue($hasSubs, 'subscribers');
        $this->assertTrue($subsCollection->contains($sub2));

        $hasSubs->detachSubscriber($sub2);
        $this->assertFalse($subsCollection->contains($sub2));

        $hasSubs->detachSubscriber($sub1);
        $this->assertFalse($subsCollection->contains($sub1));

    }

    /**
     * @depends test_attachSubscriber_addSubscriber
     */
    public function test_hasSubscriber_worksProperly()
    {
        $sub1 = new Subscriber();
        $sub2 = new Subscriber();
        $hasSubs = new HasSubscribers();
        $hasSubs->attachSubscriber($sub1);
        $this->assertTrue($hasSubs->hasSubscriber($sub1));
        $this->assertFalse($hasSubs->hasSubscriber($sub2));
    }

    /**
     * @depends test_attachSubscriber_addSubscriber
     * @depends test_dettachSubscriber_removeSubscriber
     */
    public function test_getSubscribers_worksProperly()
    {
        $sub1 = new Subscriber();
        $hasSubs = new HasSubscribers();

        /** @var SubscribersCollection $subsCollection */
        $subsCollection = $this->getNonPublicPropertyValue($hasSubs, 'subscribers');
        $this->assertEquals($subsCollection, $hasSubs->getSubscribers());

        $hasSubs->attachSubscriber($sub1);
        $subsCollection = $this->getNonPublicPropertyValue($hasSubs, 'subscribers');
        $this->assertEquals($subsCollection, $hasSubs->getSubscribers());

        $hasSubs->detachSubscriber($sub1);
        $subsCollection = $this->getNonPublicPropertyValue($hasSubs, 'subscribers');
        $this->assertEquals($subsCollection, $hasSubs->getSubscribers());
    }

}