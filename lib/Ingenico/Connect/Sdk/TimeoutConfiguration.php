<?php

namespace Ingenico\Connect\Sdk;

/**
 * Class TimeoutConfiguration
 *
 * @package Ingenico\Connect\Sdk
 */
class TimeoutConfiguration
{
    /**
     * @var int
     */
    protected $connectTimeout = 10;
    /**
     * @var int
     */
    protected $timeout = 50;

    /**
     * TimeoutConfiguration constructor.
     * @param int $connectTimeout
     * @param int $timeout
     */
    public function __construct($connectTimeout = 10, $timeout = 50)
    {
        $this->connectTimeout = $connectTimeout;
        $this->timeout = $timeout;
    }

    /**
     * @return int
     */
    public function getConnectTimeout()
    {
        return $this->connectTimeout;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }
}
