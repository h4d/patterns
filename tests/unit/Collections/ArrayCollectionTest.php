<?php


namespace H4D\Patterns\Tests\Unit\Collections;


use H4D\Patterns\Collections\ArrayCollection;

class ArrayCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function test_get_withSinpleArrayCollection_getProperResults()
    {
        $collection = new ArrayCollection(['a', 'b', 'c']);
        $this->assertEquals('a', $collection->get(0));
        $this->assertEquals('b', $collection->get(1));
        $this->assertEquals('c', $collection->get(2));
        $this->assertEquals(null, $collection->get(3));
    }

    public function test_get_withAssocArrayCollection_getProperResults()
    {
        $collection = new ArrayCollection(['a'=>'A', 'b'=>'B']);
        $this->assertEquals('A', $collection->get('a'));
        $this->assertEquals('B', $collection->get('b'));
        $this->assertEquals(null, $collection->get('c'));
    }

    public function test_getAll_returnsProperArray()
    {
        $data = ['a'=>'A', 'b'=>'B'];
        $collection = new ArrayCollection($data);
        $this->assertEquals($data, $collection->getAll());
    }

    public function test_has_returnsProperValues()
    {
        $data = ['a'=>'A', 'b'=>'B'];
        $collection = new ArrayCollection($data);
        $this->assertTrue($collection->has('a'));
        $this->assertFalse($collection->has('c'));
    }

    public function test_count_returnsProperValues()
    {
        $data = ['a'=>'A', 'b'=>'B'];
        $collection = new ArrayCollection($data);
        $this->assertEquals(2, count($collection));
    }

    /**
     * @depends test_has_returnsProperValues
     * @depends test_get_withAssocArrayCollection_getProperResults
     */
    public function test_set_setsANewValue()
    {
        $data = ['a'=>'A', 'b'=>'B'];
        $collection = new ArrayCollection($data);
        $collection->set('c', 'C');
        $this->assertEquals(3, count($collection));
        $this->assertTrue($collection->has('c'));
        $this->assertEquals('C', $collection->get('c'));
    }

    /**
     * @depends test_has_returnsProperValues
     * @depends test_get_withAssocArrayCollection_getProperResults
     */
    public function test_set_updateAValue()
    {
        $data = ['a'=>'A', 'b'=>'B'];
        $collection = new ArrayCollection($data);
        $collection->set('a', 'C');
        $this->assertTrue($collection->has('a'));
        $this->assertEquals('C', $collection->get('a'));
    }

}