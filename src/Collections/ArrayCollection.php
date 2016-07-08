<?php


namespace H4D\Patterns\Collections;

class ArrayCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var array
     */
    protected $elements = [];

    /**
     * ArrayCollection constructor.
     *
     * @param array $elements
     */
    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

    /**
     * @param string $element
     * @param mixed $default
     *
     * @return mixed
     */
    public function get($element, $default = null)
    {
        return $this->has($element) ? $this->elements[$element] : $default;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->elements;
    }

    /**
     * @param string $element
     * @param mixed $value
     *
     * @return $this
     */
    public function set($element, $value)
    {
        $this->elements[$element] = $value;

        return $this;
    }

    /**
     * @param string $element
     *
     * @return bool
     */
    public function has($element)
    {
        return array_key_exists($element, $this->elements);
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->elements);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->elements);
    }
}