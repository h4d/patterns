<?php


namespace H4D\Patterns\Interfaces;


interface EventInterface
{
    /**
     * @return string
     */
    public function getMessage();

    /**
     * @return array
     */
    public function getContext();

    /**
     * @param string $key
     * @param mixed $default
     *
     * @return mixed
     */
    public function getContextValue($key, $default = null);

    /**
     * @return int
     */
    public function getTimestamp();

    /**
     * @return array
     */
    public function toArray();
}