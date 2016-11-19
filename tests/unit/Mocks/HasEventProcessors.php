<?php


namespace H4D\Patterns\Tests\Unit\Mocks;

use H4D\Patterns\Collections\EventProcessorsCollection;
use H4D\Patterns\Traits\EventProcessorsAwareTrait;

class HasEventProcessors
{
    use EventProcessorsAwareTrait;

    public function __construct()
    {
        $this->processors = new EventProcessorsCollection();
    }
}