<?php
namespace Ingenico\Connect\Sdk;

use UnexpectedValueException;

/**
 * Class ResourceLogger
 *
 * @package Ingenico\Connect\Sdk
 */
class ResourceLogger implements CommunicatorLogger
{
    /** */
    const DATE_FORMAT_STRING = DATE_ATOM;

    /** @var resource */
    protected $resource;

    /** @param resource $resource */
    public function __construct($resource)
    {
        if (!is_resource($resource)) {
            throw new UnexpectedValueException('resource expected');
        }
        $this->resource = $resource;
    }

    /** @inheritdoc */
    public function log($message)
    {
        fwrite($this->resource, $this->getDatePrefix() . $message . PHP_EOL);
    }

    /** @inheritdoc */
    public function logException($message, Exception $exception)
    {
        fwrite($this->resource, $this->getDatePrefix() . $message . PHP_EOL . (string) $exception . PHP_EOL);
    }

    /** @return string */
    protected function getDatePrefix()
    {
        return date(static::DATE_FORMAT_STRING) . ' ';
    }
}
