<?php

namespace H4D\Patterns\Events;

use H4D\Patterns\Interfaces\EventInterface;

abstract class AbstractEvent implements EventInterface
{
    /**
     * @var int
     */
    protected $timestamp;
    /**
     * @var string
     */
    protected $message;
    /**
     * @var array
     */
    protected $context = [];

    /**
     * Event constructor.
     *
     * @param string $message
     * @param array $context
     */
    public function __construct($message, $context = [])
    {
        $this->message = $message;
        $this->context = $context;
        $this->timestamp = time();
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return array
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string $key
     * @param mixed $default
     *
     * @return mixed|null
     */
    public function getContextValue($key, $default = null)
    {
        $value = $this->hasContextKey($key) ? $this->context[$key] : $default;

        return $value;
    }

    /**
     * @param string $attrName
     *
     * @return bool
     */
    public function hasContextKey($attrName)
    {
        return array_key_exists($attrName, $this->context);
    }
    
    /**
     * @return array
     */
    public function toArray()
    {
        return ['timestamp'=>$this->timestamp,
                'message'=>$this->message,
                'context'=>$this->context];
    }

}