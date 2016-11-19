<?php


namespace H4D\Patterns\Tests\Unit\Mocks;


class SingletonTraitTest extends \PHPUnit_Framework_TestCase
{
    public function test_getInstance_resturnsTheSameInstance()
    {
        $instance1 = MySingleton::i();
        $instance2 = MySingleton::i();
        $this->assertEquals($instance1, $instance2);
    }

//    /**
//     * @expectedException \Error
//     */
//    public function test_clone_DoNotWork()
//    {
//        $instance1 = MySingleton::i();
//        $instance2 = clone $instance1;
//    }
//
//    public function test_wakeup_DoNotWork()
//    {
//        $instance1 = MySingleton::i();
//        $instance2 = unserialize(serialize($instance1));
//    }
}