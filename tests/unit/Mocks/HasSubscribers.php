<?php


namespace H4D\Patterns\Tests\Unit\Mocks;

use H4D\Patterns\Collections\SubscribersCollection;
use H4D\Patterns\Traits\SubscribersAwareTrait;

class HasSubscribers
{
    use SubscribersAwareTrait;

    public function __construct()
    {
        $this->subscribers = new SubscribersCollection();
    }
}