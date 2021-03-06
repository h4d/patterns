<?php

namespace H4D\Patterns\Events;

use H4D\Patterns\Collections\ArrayCollection;
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
     * @var ArrayCollection
     */
    protected $context;
    /**
     * @var array
     */
    protected static $requiredContextFields = [];

    /**
     * Event constructor.
     *
     * @param string $message
     * @param array|ArrayCollection $context
     */
    public function __construct($message, $context = [])
    {
        $this->message = $message;
        $this->timestamp = time();
        $this->checkRequiredContextFields($context);
        $this->context = ($context instanceof ArrayCollection) ? $context : new ArrayCollection($context);
    }

    /**
     * @param $context
     */
    protected function checkRequiredContextFields($context)
    {
        foreach (static::$requiredContextFields as $requiredContextField)
        {
            if (!array_key_exists($requiredContextField, $context))
            {
                throw new \InvalidArgumentException(sprintf('Required context field missing! ' .
                                                            'Required fields: %s',
                                                            implode(', ', static::$requiredContextFields)));
            }
        }
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
     * @return ArrayCollection
     */
    public function getContext()
    {
        return $this->context;
    }

}