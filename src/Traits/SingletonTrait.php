<?php


namespace H4D\Patterns\Traits;


trait SingletonTrait
{
    /**
     * @var static
     */
    protected static $instance;

    private function __construct()
    {
        $this->init();
    }

    /**
     * @return static
     */
    public static function getInstance()
    {
        return isset(static::$instance)
            ? static::$instance
            : static::$instance = new static();
    }

    /**
     * @return static
     */
    public static function i()
    {
        return static::getInstance();
    }

    protected function init()
    {
    }

    /**
     * @return void
     */
    private function __clone()
    {
    }

    /** @noinspection PhpUnusedPrivateMethodInspection */

    /**
     * @return void
     */
    private function __wakeup()
    {
    }
}