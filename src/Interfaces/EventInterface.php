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
     * @return int
     */
    public function getTimestamp();

    /**
     * @return array
     */
    public function toArray();
}