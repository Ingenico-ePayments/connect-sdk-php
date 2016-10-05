<?php
namespace Ingenico\Connect\Sdk;

/**
 * Class ConnectionResponse
 *
 * @package Ingenico\Connect\Sdk
 */
interface ConnectionResponse
{
    /**
     * @return string
     */
    public function getHttpStatusCode();

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @param string $name
     * @return mixed
     */
    public function getHeaderValue($name);

    /**
     * @return string
     */
    public function getBody();
}
