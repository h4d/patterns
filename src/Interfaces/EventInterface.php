<?php


namespace H4D\Patterns\Interfaces;


use H4D\Patterns\Collections\ArrayCollection;

interface EventInterface
{
    /**
     * @return string
     */
    public function getMessage();

    /**
     * @return ArrayCollection
     */
    public function getContext();

    /**
     * @return int
     */
    public function getTimestamp();

}