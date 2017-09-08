<?php
namespace Ingenico\Connect\Sdk\Webhooks;

use RuntimeException;

/**
 * Class ApiVersionMismatchException
 *
 * @package Ingenico\Connect\Sdk\Webhooks
 */
class ApiVersionMismatchException extends RuntimeException
{
    /** @var string */
    protected $eventApiVersion;

    /** @var string */
    protected $sdkApiVersion;

    /**
     * @param string $eventApiVersion
     * @param string $sdkApiVersion
     */
    public function __construct($eventApiVersion, $sdkApiVersion)
    {
        parent::__construct('event API version ' . $eventApiVersion . ' is not compatible with SDK API version ' . $sdkApiVersion);
        $this->eventApiVersion = $eventApiVersion;
        $this->sdkApiVersion = $sdkApiVersion;
    }

    /**
     * @return string
     */
    public function getEventApiVersion()
    {
        return $this->eventApiVersion;
    }

    /**
     * @return string
     */
    public function getSdkApiVersion()
    {
        return $this->sdkApiVersion;
    }
}
